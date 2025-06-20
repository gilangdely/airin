<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\DetailTagihan;
use Carbon\Carbon;
use App\Models\Meteran;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use App\Models\TarifLayanan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class TagihanController extends Controller
{
    /**
     * Display listing of tagihan
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Tagihan::query();

            // Filter columns for search
            $except = ['created_by', 'updated_by'];
            $columns = collect($query->getModel()->getFillable())->filter(function ($item) use ($except) {
                return !in_array($item, $except);
            })->toArray();

            $selectedColumns = $request->get('col', $columns);

            // Search functionality
            if ($search = $request->get('search')) {
                $query->where(function ($query) use ($search, $selectedColumns) {
                    foreach ($selectedColumns as $column) {
                        $query->orWhere($column, 'like', '%' . $search . '%');
                    }
                });
            }

            $perPage = $request->get('per_page', 10);
            $tagihan = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Data tagihan berhasil diambil',
                'data' => $tagihan,
                'columns' => $columns,
                'selected_columns' => $selectedColumns
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data tagihan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get data for creating new tagihan
     */
    public function create($meteran_id): JsonResponse
    {
        try {
            $meteran = Meteran::findOrFail($meteran_id);
            $now = new DateTime();

            // Initialize tagihan data
            $tagihan = [
                'bulan' => $now->format('M'),
                'tahun' => $now->format('Y'),
                'pelanggan' => $meteran->pelanggan->nama_pelanggan
            ];

            $pemakaianList = Pemakaian::where('nomor_meteran', $meteran->nomor_meteran)
                ->where('status_pembayaran', 0)
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

            if ($pemakaianList->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada tagihan yang perlu dibayar.'
                ], 404);
            }

            // Get all service IDs
            $idLayananList = $pemakaianList->pluck('id_layanan')->unique();

            // Get all tariffs for used services
            $tarifLayanan = DB::table('tarif_layanan')
                ->whereIn('id_layanan', $idLayananList)
                ->orderBy('min_pemakaian', 'asc')
                ->get()
                ->groupBy('id_layanan');

            if ($tarifLayanan->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada tarif yang tersedia untuk layanan tersebut.'
                ], 404);
            }

            $totalTagihan = 0;
            $rincianTagihan = [];

            foreach ($pemakaianList as $pemakaian) {
                $totalPakai = $pemakaian->pakai;
                $idLayanan = $pemakaian->id_layanan;

                $tarifList = $tarifLayanan[$idLayanan] ?? collect();

                $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                    return $totalPakai >= $t->min_pemakaian &&
                        ($t->max_pemakaian === null || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian);
                });

                if (!$tarif) {
                    return response()->json([
                        'success' => false,
                        'message' => "Tidak ada tarif yang cocok untuk pemakaian $totalPakai m³."
                    ], 404);
                }

                $tagihanBulanIni = $totalPakai * $tarif->tarif;
                $totalTagihan += $tagihanBulanIni;

                $rincianTagihan[] = [
                    'bulan' => $pemakaian->tblbulan->nama_bulan,
                    'tahun' => $pemakaian->tahun,
                    'id_pakai' => $pemakaian->id_pakai,
                    'pakai' => $totalPakai,
                    'tarif' => $tarif->tarif,
                    'subtotal' => $tagihanBulanIni
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Data tagihan berhasil disiapkan',
                'data' => [
                    'tagihan' => $tagihan,
                    'rincian_tagihan' => $rincianTagihan,
                    'total_tagihan' => $totalTagihan,
                    'meteran' => $meteran
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyiapkan data tagihan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store new tagihan
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id_bulan' => 'required|string',
            'id_pelanggan' => 'required|string|max:50',
            'nomor_meteran' => 'required|max:10',
            'nominal' => 'required|numeric',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $bulan = date('n', strtotime($request->id_bulan));
            $tahun = date('Y', strtotime($request->id_bulan));
            $nomor_meteran = $request->nomor_meteran;
            $id_pelanggan = $request->id_pelanggan;
            $waktu_awal = $request->waktu_awal;
            $waktu_akhir = $request->waktu_akhir;

            // Check existing tagihan
            $existingTagihan = Tagihan::where('nomor_meteran', $nomor_meteran)
                ->where('id_bulan', $bulan)
                ->where('tahun', $tahun)
                ->where('id_pelanggan', $id_pelanggan)
                ->where('status_pembayaran', 0)
                ->where('status_tagihan', 1)
                ->exists();

            if ($existingTagihan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terdapat tagihan aktif di bulan ini!'
                ], 409);
            }

            $id_tagihan = $tahun . $bulan . $nomor_meteran . rand(100, 999);

            $datatagihan = [
                'id_tagihan' => $id_tagihan,
                'id_bulan' => $bulan,
                'tahun' => $tahun,
                'id_pelanggan' => $id_pelanggan,
                'nomor_meteran' => $nomor_meteran,
                'waktu_awal' => $waktu_awal,
                'waktu_akhir' => $waktu_akhir,
                'status_tagihan' => 1,
                'status_pembayaran' => 0,
                'created_by' => Auth::id() ?? 1,
                'updated_by' => Auth::id() ?? 1
            ];

            $pemakaianList = Pemakaian::where('nomor_meteran', $nomor_meteran)
                ->where('status_pembayaran', 0)
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

            if ($pemakaianList->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada tagihan yang perlu dibayar.'
                ], 404);
            }

            // Calculate tariff
            $idLayananList = $pemakaianList->pluck('id_layanan')->unique();
            $tarifLayanan = DB::table('tarif_layanan')
                ->whereIn('id_layanan', $idLayananList)
                ->orderBy('min_pemakaian', 'asc')
                ->get()
                ->groupBy('id_layanan');

            $totalTagihan = 0;
            $rincianTagihan = [];

            foreach ($pemakaianList as $pemakaian) {
                $totalPakai = $pemakaian->pakai;
                $idLayanan = $pemakaian->id_layanan;

                $tarifList = $tarifLayanan[$idLayanan] ?? collect();

                $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                    return $totalPakai >= $t->min_pemakaian &&
                        ($t->max_pemakaian === null || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian);
                });

                if (!$tarif) {
                    return response()->json([
                        'success' => false,
                        'message' => "Tarif tidak ditemukan untuk pemakaian $totalPakai m³."
                    ], 404);
                }

                $tagihanBulanIni = $totalPakai * $tarif->tarif;
                $totalTagihan += $tagihanBulanIni;

                $rincianTagihan[] = [
                    'id_tagihan' => $id_tagihan,
                    'id_pakai' => $pemakaian->id_pakai,
                    'pakai' => $totalPakai,
                    'tarif' => $tarif->tarif,
                    'subtotal' => $tagihanBulanIni
                ];
            }

            $datatagihan['nominal'] = $totalTagihan;

            // Save data
            DB::beginTransaction();
            $tagihan = Tagihan::create($datatagihan);
            DetailTagihan::insert($rincianTagihan);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Tagihan berhasil dibuat',
                'data' => [
                    'tagihan' => $tagihan,
                    'total_tagihan' => $totalTagihan,
                    'rincian_tagihan' => $rincianTagihan
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat tagihan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show specific tagihan
     */
    public function show($id): JsonResponse
    {
        try {
            $tagihan = Tagihan::findOrFail($id);
            $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();

            return response()->json([
                'success' => true,
                'message' => 'Data tagihan berhasil diambil',
                'data' => [
                    'tagihan' => $tagihan,
                    'detail_tagihan' => $detailtagihan
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update tagihan
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id_bulan' => 'required|string|max:3',
            'tahun' => 'required|integer',
            'id_pelanggan' => 'required|string|max:50',
            'nominal' => 'required|numeric',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date',
            'status_tagihan' => 'required|boolean',
            'status_pembayaran' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $tagihan = Tagihan::findOrFail($id);
            $tagihan->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Tagihan berhasil diperbarui',
                'data' => $tagihan
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tagihan ini sudah digunakan dan tidak dapat diperbarui.'
                ], 409);
            }
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Delete tagihan
     */
    public function destroy($id): JsonResponse
    {
        try {
            $tagihan = Tagihan::findOrFail($id);

            DB::beginTransaction();
            DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->delete();
            $tagihan->delete();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Tagihan berhasil dihapus'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            if ($e->getCode() == '23000') {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tagihan ini sudah digunakan dan tidak dapat dihapus.'
                ], 409);
            }
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Check customer bill
     */
    public function cekTagihanPelanggan($meteran_id): JsonResponse
    {
        try {
            $meteran = Meteran::findOrFail($meteran_id);
            $bulanSekarang = Carbon::now()->month;
            $tahunSekarang = Carbon::now()->year;

            // Check existing tagihan
            $existingTagihan = Tagihan::where('id_meteran', $meteran->id_meteran)
                ->where('id_bulan', $bulanSekarang)
                ->where('tahun', $tahunSekarang)
                ->where('id_pelanggan', $meteran->id_pelanggan)
                ->where('status_pembayaran', 0)
                ->where('status_tagihan', 1)
                ->exists();

            if ($existingTagihan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terdapat tagihan aktif di bulan ini!'
                ], 409);
            }

            // Prepare tagihan data
            $id_tagihan = $tahunSekarang . $bulanSekarang . $meteran->id_meteran . rand(100, 999);
            $tanggal_awal = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->startOfMonth()->toDateString();
            $tanggal_akhir = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->endOfMonth()->toDateString();

            $datatagihan = [
                'id_tagihan' => $id_tagihan,
                'id_bulan' => $bulanSekarang,
                'tahun' => $tahunSekarang,
                'id_pelanggan' => $meteran->id_pelanggan,
                'id_meteran' => $meteran->id_meteran,
                'waktu_awal' => $tanggal_awal,
                'waktu_akhir' => $tanggal_akhir,
                'status_tagihan' => 1,
                'status_pembayaran' => 0,
                'created_by' => Auth::id() ?? 1,
                'updated_by' => Auth::id() ?? 1
            ];

            // Calculate bill details
            $pemakaianList = DB::table('pemakaian')
                ->where('id_meteran', $meteran->id_meteran)
                ->where('status_pembayaran', 0)
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

            if ($pemakaianList->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada tagihan yang perlu dibayar.'
                ], 404);
            }

            $idLayananList = $pemakaianList->pluck('id_layanan')->unique();
            $tarifLayanan = DB::table('tarif_layanan')
                ->whereIn('id_layanan', $idLayananList)
                ->orderBy('min_pemakaian', 'asc')
                ->get()
                ->groupBy('id_layanan');

            $totalTagihan = 0;
            $rincianTagihan = [];

            foreach ($pemakaianList as $pemakaian) {
                $totalPakai = $pemakaian->pakai;
                $idLayanan = $pemakaian->id_layanan;

                $tarifList = $tarifLayanan[$idLayanan] ?? collect();

                $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                    return $t->min_pemakaian <= $totalPakai &&
                        ($t->max_pemakaian === null || $t->max_pemakaian >= $totalPakai);
                });

                if (!$tarif) {
                    continue;
                }

                $tagihanBulanIni = $totalPakai * $tarif->tarif;
                $totalTagihan += $tagihanBulanIni;

                $rincianTagihan[] = [
                    'id_tagihan' => $id_tagihan,
                    'id_pakai' => $pemakaian->id_pakai,
                    'pakai' => $totalPakai,
                    'tarif' => $tarif->tarif,
                    'subtotal' => $tagihanBulanIni
                ];
            }

            // Save data
            DB::beginTransaction();
            Tagihan::create($datatagihan);
            DetailTagihan::insert($rincianTagihan);

            $tagihan = Tagihan::find($id_tagihan);
            $tagihan->update(['nominal' => $totalTagihan]);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Tagihan berhasil dibuat',
                'data' => [
                    'total_tagihan' => $totalTagihan,
                    'rincian' => $rincianTagihan,
                    'tagihan' => $tagihan
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat tagihan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check card number
     */
    public function prosesKartuMeteran(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'chip_kartu' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $nokartu = $request->chip_kartu;
            $meteran = Meteran::where('chip_kartu', $nokartu)->first();

            if (!$meteran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kartu meteran tidak ditemukan'
                ], 404);
            }

            $tanggalSekarang = date('Y-m-d');

            $tagihan = Tagihan::where('nomor_meteran', $meteran->nomor_meteran)
                ->where('waktu_awal', '<=', $tanggalSekarang)
                ->where('waktu_akhir', '>=', $tanggalSekarang)
                ->first();

            if (!$tagihan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada tagihan aktif untuk kartu ini'
                ], 404);
            }

            $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();

            return response()->json([
                'success' => true,
                'message' => 'Tagihan ditemukan',
                'data' => [
                    'tagihan' => $tagihan,
                    'detail_tagihan' => $detailtagihan,
                    'meteran' => $meteran
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses kartu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get tagihan by Nomer Meteran
     */
    public function cekTagihanByMeteran(Request $request): JsonResponse
    {
        if (!$request->has('nomor_meteran') || empty($request->input('nomor_meteran'))) {
            return ApiResponse::error("Nomor meteran tidak boleh kosong.", "9002", 400);
        }

        try {
            $tagihan = Tagihan::where('nomor_meteran', $request->input('nomor_meteran'))
                ->where('status_pembayaran', 0)
                ->where('status_tagihan', 1)
                ->first();

            if (!$tagihan) {
                return ApiResponse::error("Tagihan tidak ditemukan untuk nomor meteran ini.", "2001", 404);
            }

            $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();

            return ApiResponse::success([
                'tagihan' => $tagihan,
                'detail_tagihan' => $detailtagihan
            ], "Tagihan ditemukan.", "0000", 200);

        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database saat mengambil tagihan.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui saat mengambil tagihan.", "9999", 500);
        }
    }

    /**
     * Get total detail tagihan
     */
    public function getPakaiByMeteranAktif(Request $request)
    {
        $query = "SELECT
        tagihan.id_pelanggan,
        pelanggan.nama_pelanggan,
        tagihan.nomor_meteran,
        tagihan.nominal,
        tagihan.tahun,
        tagihan.waktu_awal,
        tagihan.waktu_akhir,
        tagihan.status_tagihan,
        tagihan.status_pembayaran,
        SUM(detail_tagihan.pakai) AS total_pakai
    FROM tagihan
    INNER JOIN pelanggan ON pelanggan.id_pelanggan = tagihan.id_pelanggan
    LEFT JOIN detail_tagihan ON tagihan.id_tagihan = detail_tagihan.id_tagihan
    GROUP BY tagihan.id_tagihan";

        $pakaiList = DB::select($query);

        if (empty($pakaiList)) {
            return ApiResponse::error("Data tagihan tidak ditemukan", "2002", 404);
        }

        return ApiResponse::success($pakaiList, "Data tagihan ditemukan", "0000", 200);
    }
}
