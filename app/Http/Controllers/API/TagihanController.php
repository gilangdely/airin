<?php

namespace App\Http\Controllers\API;

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
use Throwable;

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
            // Mengambil data meteran atau gagal jika tidak ditemukan
            // ModelNotFoundException akan ditangkap oleh blok catch.
            $meteran = Meteran::findOrFail($meteran_id);
            $now = new DateTime();

            // Inisialisasi data tagihan utama
            $tagihan = [
                'bulan' => $now->format('M'),
                'tahun' => $now->format('Y'),
                'pelanggan' => $meteran->pelanggan->nama_pelanggan
            ];

            // Mengambil semua data pemakaian yang belum dibayar
            $pemakaianList = Pemakaian::where('nomor_meteran', $meteran->nomor_meteran)
                ->where('status_pembayaran', 0)
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

            // Jika tidak ada pemakaian yang perlu dibayar, kembalikan respons sukses dengan data kosong
            if ($pemakaianList->isEmpty()) {
                $responseData = [
                    'tagihan' => $tagihan,
                    'rincian_tagihan' => [],
                    'total_tagihan' => 0,
                    'meteran' => $meteran
                ];
                // Menggunakan RC 0000 untuk sukses, dengan pesan yang sesuai
                return ApiResponse::success($responseData, 'Tidak ada tagihan yang perlu dibayar.', '0000');
            }

            // Kumpulkan semua id_layanan yang unik dari daftar pemakaian
            $idLayananList = $pemakaianList->pluck('id_layanan')->unique();

            // Ambil semua tarif yang relevan untuk layanan yang digunakan
            $tarifLayanan = DB::table('tarif_layanan')
                ->whereIn('id_layanan', $idLayananList)
                ->orderBy('min_pemakaian', 'asc')
                ->get()
                ->groupBy('id_layanan');

            // Jika tidak ada tarif yang ditemukan untuk layanan tersebut, kembalikan error
            if ($tarifLayanan->isEmpty()) {
                // RC 2001: Data Not Found
                return ApiResponse::error('Tidak ada tarif yang tersedia untuk layanan tersebut.', '2001', 404);
            }

            $totalTagihan = 0;
            $rincianTagihan = [];

            // Iterasi melalui setiap data pemakaian untuk menghitung tagihan
            foreach ($pemakaianList as $pemakaian) {
                $totalPakai = $pemakaian->pakai;
                $idLayanan = $pemakaian->id_layanan;

                $tarifList = $tarifLayanan[$idLayanan] ?? collect();

                // Cari tarif yang cocok berdasarkan jumlah pemakaian
                $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                    return $totalPakai >= $t->min_pemakaian &&
                        ($t->max_pemakaian === null || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian);
                });

                // Jika tidak ada tarif yang cocok, kembalikan error
                if (!$tarif) {
                    // RC 2001: Data Not Found
                    $message = "Tidak ada tarif yang cocok untuk pemakaian $totalPakai m³.";
                    return ApiResponse::error($message, '2001', 404);
                }

                // Hitung tagihan untuk bulan ini dan tambahkan ke total
                $tagihanBulanIni = $totalPakai * $tarif->tarif;
                $totalTagihan += $tagihanBulanIni;

                // Tambahkan rincian tagihan per bulan
                $rincianTagihan[] = [
                    'bulan' => $pemakaian->tblbulan->nama_bulan,
                    'tahun' => $pemakaian->tahun,
                    'id_pakai' => $pemakaian->id_pakai,
                    'pakai' => $totalPakai,
                    'tarif' => $tarif->tarif,
                    'subtotal' => $tagihanBulanIni
                ];
            }

            // Siapkan data final untuk respon sukses
            $responseData = [
                'tagihan' => $tagihan,
                'rincian_tagihan' => $rincianTagihan,
                'total_tagihan' => $totalTagihan,
                'meteran' => $meteran
            ];

            // RC 0000: Success Response
            return ApiResponse::success($responseData, 'Data tagihan berhasil disiapkan', '0000');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Menangkap error jika Meteran::findOrFail gagal
            // RC 2001: Data Not Found
            return ApiResponse::error('Data meteran tidak ditemukan.', '2001', 404);
        } catch (\Exception $e) {
            // Menangkap semua error lain yang tidak terduga
            // RC 9999: Unknown Error
            return ApiResponse::error('Gagal menyiapkan data tagihan', '9999', 500, $e->getMessage());
        }
    }

    /**
     * Store new tagihan
     */
    public function store(Request $request): JsonResponse
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_bulan' => 'required|string',
            'id_pelanggan' => 'required|string|max:50',
            'nomor_meteran' => 'required|max:10',
            // 'nominal' tidak divalidasi karena akan dihitung ulang
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date'
        ]);

        if ($validator->fails()) {
            // RC 9001: Validation Failed
            return ApiResponse::error('Validasi data gagal.', '9001', 422, $validator->errors());
        }

        // Persiapan data
        $bulan = date('n', strtotime($request->id_bulan));
        $tahun = date('Y', strtotime($request->id_bulan));
        $nomor_meteran = $request->nomor_meteran;
        $id_pelanggan = $request->id_pelanggan;
        $waktu_awal = $request->waktu_awal;
        $waktu_akhir = $request->waktu_akhir;

        // Cek jika sudah ada tagihan aktif untuk periode yang sama
        $tagihanExists = Tagihan::where('nomor_meteran', $nomor_meteran)
            ->where('id_bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('id_pelanggan', $id_pelanggan)
            ->where('status_tagihan', 1) // 1 = aktif
            ->exists();

        if ($tagihanExists) {
            // RC 2002: Data Duplicated
            return ApiResponse::error('Terdapat tagihan aktif di bulan ini!', '2002', 409);
        }

        // Ambil pemakaian yang belum ditagih
        $pemakaianList = Pemakaian::where('nomor_meteran', $nomor_meteran)
            ->where('status_pembayaran', 0) // 0 = belum dibayar
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($pemakaianList->isEmpty()) {
            // RC 2001: Data Not Found
            return ApiResponse::error('Tidak ada tagihan yang perlu dibayar.', '2001', 404);
        }

        // Ambil tarif berdasarkan layanan yang digunakan
        $idLayananList = $pemakaianList->pluck('id_layanan')->unique();
        $tarifLayanan = DB::table('tarif_layanan')
            ->whereIn('id_layanan', $idLayananList)
            ->orderBy('min_pemakaian', 'asc')
            ->get()
            ->groupBy('id_layanan');

        // Hitung total dan rincian tagihan
        $totalTagihan = 0;
        $rincianTagihan = [];
        $id_tagihan = $tahun . str_pad($bulan, 2, '0', STR_PAD_LEFT) . $nomor_meteran . rand(100, 999);

        foreach ($pemakaianList as $pemakaian) {
            $totalPakai = $pemakaian->pakai;
            $idLayanan = $pemakaian->id_layanan;
            $tarifList = $tarifLayanan[$idLayanan] ?? collect();
            $tarif = $tarifList->firstWhere(
                fn($t) =>
                $totalPakai >= $t->min_pemakaian &&
                (is_null($t->max_pemakaian) || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian)
            );

            if (!$tarif) {
                // RC 2001: Data Not Found
                return ApiResponse::error("Tarif tidak ditemukan untuk pemakaian $totalPakai m³.", '2001', 404);
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

        // Persiapan data untuk disimpan
        $datatagihan = [
            'id_tagihan' => $id_tagihan,
            'id_bulan' => $bulan,
            'tahun' => $tahun,
            'id_pelanggan' => $id_pelanggan,
            'nomor_meteran' => $nomor_meteran,
            'nominal' => $totalTagihan,
            'waktu_awal' => $waktu_awal,
            'waktu_akhir' => $waktu_akhir,
            'status_tagihan' => 1,
            'status_pembayaran' => 0,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ];

        // Simpan ke database menggunakan transaksi
        try {
            DB::beginTransaction();
            $newTagihan = Tagihan::create($datatagihan);
            DetailTagihan::insert($rincianTagihan);

            // Update status pemakaian yang sudah ditagihkan
            $pemakaianIds = $pemakaianList->pluck('id_pakai');
            Pemakaian::whereIn('id_pakai', $pemakaianIds)->update([
                'status_pembayaran' => 1, // 1 = Sudah Ditagih/Diproses
                'id_tagihan' => $id_tagihan,
            ]);

            DB::commit();

            // RC 0000: Success Response
            return ApiResponse::success($newTagihan, 'Tagihan berhasil dibuat', '0000', 201);
        } catch (Throwable $e) {
            DB::rollBack();
            report($e);
            // RC 9999: Unknown Error
            return ApiResponse::error('Terjadi kesalahan saat membuat data.', '9999', 500, ['error' => $e->getMessage()]);
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
                ->with(['detailtagihan', 'bulan', 'meteran', 'meteran.pelanggan'])
                ->withSum('detailtagihan as total_pakai', 'pakai');

                if ($request->has('waktu_awal')) {
                $startDate = Carbon::parse($request->input('waktu_awal'))->startOfDay();
                $endDate = $request->has('waktu_akhir')
                    ? Carbon::parse($request->input('waktu_akhir'))->endOfDay()
                    : Carbon::now()->endOfDay();

                // Menggunakan whereBetween pada created_at, atau sesuaikan dengan kolom tanggal
                $tagihan->whereBetween('created_at', [$startDate, $endDate]);
            }
                $tagihan = $tagihan->paginate(10);

            if ($tagihan->isEmpty()) {
                return ApiResponse::error("Data tagihan tidak ditemukan.", "2001", 404);
            }

            return ApiResponse::success($tagihan, "Data tagihan ditemukan.", "0000", 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }

    /**
     * Get total detail tagihan
     */
    public function getTotalTagihanPetugas(Request $request): JsonResponse
    {
        try {

            // Filter opsional dari query string
            $status = $request->query('status');
            $tahun = $request->query('tahun');
            $bulan = $request->query('bulan');
            $search = $request->query('search');

            $whereClauses = [];
            $bindings = [];

            if (!is_null($status)) {
                $whereClauses[] = 'tagihan.status_pembayaran = ?';
                $bindings[] = $status;
            }

            if (!is_null($tahun)) {
                $whereClauses[] = 'tagihan.tahun = ?';
                $bindings[] = $tahun;
            }

            if (!is_null($bulan)) {
                $whereClauses[] = 'MONTH(tagihan.waktu_awal, unique) = ?';
                $bindings[] = $bulan;
            }

            if (!is_null($search)) {
                $whereClauses[] = '(pelanggan.nama_pelanggan LIKE ? OR tagihan.nomor_meteran LIKE ?)';
                $bindings[] = "%$search%";
                $bindings[] = "%$search%";
            }

            $whereSQL = '';
            if (!empty($whereClauses)) {
                $whereSQL = 'AND ' . implode(' AND ', $whereClauses);
            }

            $sql = "
                SELECT
                tagihan.id_tagihan,
                tagihan.id_pelanggan,
                pemakaian.id_pakai,
                pemakaian.id_layanan,
                pelanggan.nama_pelanggan,
                tagihan.nomor_meteran,
                tagihan.nominal,
                tagihan.tahun,
                pemakaian.awal,
                pemakaian.akhir,
                pemakaian.pakai,
                tagihan.waktu_awal,
                tagihan.waktu_akhir,
                tagihan.status_tagihan,
                tagihan.status_pembayaran,
                tarif_layanan.id_tarif_layanan,
                tarif_layanan.id_layanan AS tarif_id_layanan,
                tarif_layanan.tier,
                tarif_layanan.min_pemakaian,
                tarif_layanan.max_pemakaian,
                tarif_layanan.tarif,
                SUM(detail_tagihan.pakai) AS total_pakai
            FROM tagihan
            INNER JOIN pelanggan ON pelanggan.id_pelanggan = tagihan.id_pelanggan
            LEFT JOIN detail_tagihan ON tagihan.id_tagihan = detail_tagihan.id_tagihan
            LEFT JOIN pemakaian ON pemakaian.nomor_meteran = tagihan.nomor_meteran
            LEFT JOIN tarif_layanan 
                ON tarif_layanan.id_layanan = pemakaian.id_layanan
                AND (
                    (tarif_layanan.min_pemakaian = 0 AND tarif_layanan.max_pemakaian = 0)
                    OR (pemakaian.pakai BETWEEN tarif_layanan.min_pemakaian AND tarif_layanan.max_pemakaian)
                    OR (tarif_layanan.max_pemakaian = 0 AND pemakaian.pakai >= tarif_layanan.min_pemakaian)
                )
            WHERE 1=1
            $whereSQL
            GROUP BY
                tagihan.id_tagihan,
                tagihan.id_pelanggan,
                pemakaian.id_pakai,
                pemakaian.id_layanan,
                pelanggan.nama_pelanggan,
                tagihan.nomor_meteran,
                tagihan.nominal,
                tagihan.tahun,
                pemakaian.awal,
                pemakaian.akhir,
                pemakaian.pakai,
                tagihan.waktu_awal,
                tagihan.waktu_akhir,
                tagihan.status_tagihan,
                tagihan.status_pembayaran,
                tarif_layanan.id_tarif_layanan,
                tarif_layanan.id_layanan,
                tarif_layanan.tier,
                tarif_layanan.min_pemakaian,
                tarif_layanan.max_pemakaian,
                tarif_layanan.tarif
        ";

            $data = DB::select($sql, $bindings);

            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
