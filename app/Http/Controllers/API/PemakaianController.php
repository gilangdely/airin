<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\API\BaseController;
use Carbon\Carbon;
use App\Models\Meteran;
use App\Models\Tagihan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use App\Models\DetailTagihan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;

class PemakaianController extends BaseController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pemakaian view', only: ['index', 'show']),
            new Middleware('permission:pemakaian create', only: ['create', 'store']),
            new Middleware('permission:pemakaian edit', only: ['edit', 'update']),
            new Middleware('permission:pemakaian delete', only: ['destroy']),
        ];
    }


    public function index(Request $request): JsonResponse
    {
        try {
            $status = $request->get('status');
            $tahun = $request->get('tahun', Carbon::now()->year);
            $bulan = $request->get('bulan');

            $query = Pemakaian::query()
                ->when($status !== null, function ($q) use ($status) {
                    $q->where('status_pembayaran', $status);
                })
                ->when($bulan, function ($q) use ($bulan) {
                    $q->where('bulan', $bulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->where('tahun', $tahun);
                })
                ->with(['meteran', 'tblbulan', 'meteran.pelanggan']);

            $except = ['created_by', 'updated_by'];

            $columns = collect($query->getModel()->getFillable())->filter(
                fn($item) => !in_array($item, $except)
            )->toArray();

            $selectedColumns = $request->get('col', $columns);

            if ($search = $request->get('search')) {
                $query->where(function ($query) use ($search, $selectedColumns) {
                    // Search kolom dari tabel utama (pemakaian)
                    foreach ($selectedColumns as $column) {
                        $query->orWhere($column, 'like', '%' . $search . '%');
                    }

                    // Search berdasarkan nomor meteran
                    $query->orWhereHas('meteran', function ($q) use ($search) {
                        $q->where('nomor_meteran', 'like', '%' . $search . '%');

                        // Search berdasarkan nama pelanggan
                        $q->orWhereHas('pelanggan', function ($qp) use ($search) {
                            $qp->where('nama_pelanggan', 'like', '%' . $search . '%');
                        });
                    });
                });
            }


            $pemakaian = $query->paginate(10);

            // ✅ Tambahkan pengecekan apakah data kosong
            // if ($pemakaian->isEmpty()) {
            //     return ApiResponse::error("Data yang diminta tidak ditemukan.", "2001", 404);
            // }

            return ApiResponse::success($pemakaian, "Data berhasil diambil.", "0000", 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }


    public function create(Meteran $meteran): JsonResponse
    {
        try {
            if (!$meteran) {
                return ApiResponse::error("Data meteran tidak ditemukan.", "2001", 404);
            }

            $pemakaian = Pemakaian::where('nomor_meteran', $meteran->nomor_meteran)
                ->orderBy('bulan', 'desc')
                ->first();

            if (!$pemakaian) {
                return ApiResponse::error("Data pemakaian tidak ditemukan.", "2001", 404);
            }

            return ApiResponse::success(compact('meteran', 'pemakaian'), "Data berhasil diambil.", "0000", 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_meteran' => 'required|integer',
            'bulan' => 'required',
            'akhir' => 'required|integer',
        ]);

        $inputbulan = $request->bulan;
        $replace_bln = str_replace("-", "", $inputbulan);

        $tanggal = Carbon::createFromFormat('Y-m', $inputbulan);
        $bulanSekarang = $tanggal->month;
        $tahunSekarang = $tanggal->year;
        $bulanSebelumnya = $tanggal->subMonth()->month;
        $tahunSebelumnya = $tanggal->year;

        //cek apakah sudah pernah menginputkan pemakaian untuk bulan yang diinputkan, jika sudah jangan lakukan input
        $cekpemakaian = Pemakaian::where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->first();

        if ($cekpemakaian) {
            return response()->json([
                'error' => 'Data sudah pernah diinputkan!',
                'input' => $request->all()
            ], 400);
        }

        $id_meteran = $request->id_meteran;
        $id_pakai = "TRX" . $replace_bln . $id_meteran;

        //ambil pemakaian terakhir dari data sebelumnya
        $pemakaian = Pemakaian::where('bulan', $bulanSebelumnya)
            ->where('tahun', $tahunSebelumnya)
            ->latest('created_at')
            ->first();
        $pemakaiansebelumnya = $pemakaian->akhir ?? 0;

        $meteran = Meteran::with('layanan')->where('id_meteran', $id_meteran)->first();

        $validatedData['id_pakai'] = $id_pakai;
        $validatedData['id_meteran'] = $id_meteran;
        $validatedData['bulan'] = $bulanSekarang;
        $validatedData['id_layanan'] = $meteran->id_layanan;
        $validatedData['deskripsi'] = $meteran->layanan->nama_layanan;
        $validatedData['tahun'] = $tahunSekarang;
        $validatedData['awal'] = $pemakaiansebelumnya;
        $validatedData['akhir'] = $request->akhir;
        $validatedData['pakai'] = (intval($request->akhir) - intval($pemakaiansebelumnya));
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_by'] = Auth::id();

        try {
            Pemakaian::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat membuat data.',
                'input' => $request->all()
            ], 422);
        }

        //cek apakah sudah ada tagihan untuk bulan ini atau belum
        $tagihan = Tagihan::where('id_meteran', $meteran->id_meteran)
            ->where('id_bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->where('id_pelanggan', $meteran->id_pelanggan)
            ->where('status_pembayaran', 0) //jika status_pembayaran = 0 maka artinya belum dibayar
            ->where('status_tagihan', 1) //jika status-tagihan = 1 artinya tagihan masih aktif/belum dibayar
            ->get();

        // dd($tagihan);

        if ($tagihan->isNotEmpty()) {
            return response()->json([
                'error' => 'Terdapat tagihan aktif di bulan ini!'
            ], 409);
        }

        //siapkan data untuk tagihan
        $id_tagihan = $tahunSekarang . $bulanSekarang . $meteran->id_meteran . rand(100, 999);
        $tanggal_awal = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->startOfMonth()->toDateString();
        $tanggal_akhir = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->endOfMonth()->toDateString();

        $datatagihan['id_tagihan'] = $id_tagihan;
        $datatagihan['id_bulan'] = $bulanSekarang;
        $datatagihan['tahun'] = $tahunSekarang;
        $datatagihan['id_pelanggan'] = $meteran->id_pelanggan;
        $datatagihan['id_meteran'] = $meteran->id_meteran;
        $datatagihan['waktu_awal'] = $tanggal_awal;
        $datatagihan['waktu_akhir'] = $tanggal_akhir;
        $datatagihan['status_tagihan'] = 1;
        $datatagihan['status_pembayaran'] = 0;
        $datatagihan['created_by'] = Auth::id();
        $datatagihan['updated_by'] = Auth::id();

        try {
            Tagihan::create($datatagihan);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat membuat data tagihan.'
            ], 500);
        }

        $pemakaianList = DB::table('pemakaian')
            ->where('id_meteran', $meteran->id_meteran)
            ->where('status_pembayaran', 0)
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($pemakaianList->isEmpty()) {
            return response()->json([
                'error' => 'Tidak ada tagihan yang perlu dibayar.'
            ], 400); // Kode status HTTP 404 untuk Not Found            
        }

        // Ambil semua ID layanan yang ada dalam pemakaian
        $idLayananList = $pemakaianList->pluck('id_layanan')->unique();

        // Ambil semua tarif untuk layanan yang digunakan
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

            // Ambil tarif sesuai layanan yang dipakai
            $tarifList = $tarifLayanan[$idLayanan] ?? collect();

            // Cari tarif yang sesuai untuk jumlah pemakaian ini
            $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                return $t->min_pemakaian <= $totalPakai &&
                    ($t->max_pemakaian === null || $t->max_pemakaian >= $totalPakai);
            });

            if (!$tarif) {
                continue; // Skip jika tidak ada tarif yang cocok
            }

            // Hitung tagihan bulan ini
            $tagihanBulanIni = $totalPakai * $tarif->tarif;
            $totalTagihan += $tagihanBulanIni;

            // Simpan rincian tagihan
            $rincianTagihan[] = [
                'id_tagihan' => $id_tagihan,
                'id_pakai' => $pemakaian->id_pakai,
                'pakai' => $totalPakai,
                'tarif' => $tarif->tarif,
                'subtotal' => $tagihanBulanIni
            ];
        }

        DetailTagihan::insert($rincianTagihan);

        $tagihan = Tagihan::find($id_tagihan);
        $tagihan->nominal = $totalTagihan;
        $tagihan->update();

        return response()->json([
            'message' => 'Pemakaian berhasil dibuat'
        ], 200);
    }

    public function update(Request $request, Pemakaian $pemakaian): JsonResponse
    {
        $validatedData = $request->validate([
            'id_meteran' => 'required|integer',
            'bulan' => 'required|string|max:3',
            'tahun' => 'required|string|max:4',
            'akhir' => 'required|integer',
        ]);

        $validatedData['updated_by'] = Auth::id();
        $validatedData['pakai'] = (intval($pemakaian->akhir) - intval($pemakaian->awal));

        try {
            $pemakaian->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'error' => 'Data pemakaian ini sudah digunakan dan tidak dapat diperbarui.',
                    'input' => $request->all()
                ], 422);
            }
            return response()->json([
                'error' => 'Terjadi kesalahan saat memperbarui data.',
                'input' => $request->all()
            ], 500);
        }

        return response()->json([
            'message' => 'Pemakaian berhasil diperbarui'
        ], 200);
    }

    public function destroy(Pemakaian $pemakaian): JsonResponse
    {
        try {
            $pemakaian->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'error' => 'Data pemakaian ini sudah digunakan dan tidak dapat dihapus.'
                ], 409); // 409 Conflict karena ada referensi ke data lain
            }

            return response()->json([
                'error' => 'Terjadi kesalahan saat menghapus data.'
            ], 500); // 500 Internal Server Error untuk kesalahan umum
        }

        return response()->json([
            'message' => 'Pemakaian berhasil dihapus'
        ], 200); // 200 OK untuk operasi yang berhasil

    }

    public function pemakaianByMeteran(Request $request): JsonResponse
    {
        if (!$request->has('nomor_meteran') || empty($request->input('nomor_meteran'))) {
            return ApiResponse::error("Nomor meteran tidak boleh kosong.", "9002", 400);
        }

        try {
            $pemakaian = Pemakaian::whereHas('meteran', function ($query) use ($request) {
                $query->where('nomor_meteran', $request->input('nomor_meteran'));
            })->with(['meteran', 'tblbulan'])
                ->orderBy('tahun', 'desc')
                ->orderBy('bulan', 'desc')
                ->get();

            if ($pemakaian->isEmpty()) {
                return ApiResponse::error("Tidak ada data pemakaian untuk nomor meteran ini.", "2001", 404);
            }

            return ApiResponse::success($pemakaian, "Data pemakaian berhasil diambil.", "0000", 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }
}
