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
use Doctrine\DBAL\Query\QueryException;
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
                    foreach ($selectedColumns as $column) {
                        $query->orWhere($column, 'like', '%' . $search . '%');
                    }

                    $query->orWhereHas('meteran', fn($q) => $q->where('nomor_meteran', 'like', '%' . $search . '%'));
                    $query->orWhereHas('tblbulan', fn($q) => $q->where('nama_bulan', 'like', '%' . $search . '%'));
                });
            }

            $pemakaian = $query->paginate(10);

            // ✅ Tambahkan pengecekan apakah data kosong
            if ($pemakaian->isEmpty()) {
                return ApiResponse::error("Data yang diminta tidak ditemukan.", "2001", 404);
            }

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

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'nomor_meteran' => 'required|integer',
            'bulan' => 'required',
            'akhir' => 'required|integer',
        ]);

        $nomor_meteran = $request->nomor_meteran;
        $inputbulan = $request->bulan;

        // Cek apakah bulan yang diinputkan itu bukan bulan depan
        $currentDate = Carbon::now()->format('Y-m');
        if ($inputbulan > $currentDate) {
            return ApiResponse::error(
                'Dilarang menginputkan pemakaian untuk bulan depan!',
                1001,
                400,
                $request->all()
            );
        }

        $replace_bln = str_replace("-", "", $inputbulan);

        $tanggal = Carbon::createFromFormat('Y-m', $inputbulan);
        $bulanSekarang = $tanggal->month;
        $tahunSekarang = $tanggal->year;
        $bulanSebelumnya = $tanggal->subMonth()->month;
        $tahunSebelumnya = $tanggal->year;

        // Cek apakah sudah pernah menginputkan pemakaian
        $cekpemakaian = Pemakaian::where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->where('nomor_meteran', $nomor_meteran)
            ->first();

        if ($cekpemakaian) {
            return ApiResponse::error(
                'Data sudah pernah diinputkan!',
                1002,
                409,
                $request->all()
            );
        }

        // Ambil pemakaian sebelumnya
        $pemakaian = Pemakaian::where('nomor_meteran', $nomor_meteran)
            ->where('bulan', $bulanSebelumnya)
            ->where('tahun', $tahunSebelumnya)
            ->latest('created_at')
            ->first();
        $pemakaiansebelumnya = $pemakaian->akhir ?? 0;

        if ($request->akhir <= $pemakaiansebelumnya) {
            return ApiResponse::error(
                'Data pemakaian akhir tidak valid.',
                1003,
                422,
                $request->all()
            );
        }

        $meteran = Meteran::with('layanan')->where('nomor_meteran', $nomor_meteran)->first();

        $id_pakai = "TRX" . $replace_bln . $nomor_meteran;
        $validatedData['id_pakai'] = $id_pakai;
        $validatedData['nomor_meteran'] = $nomor_meteran;
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
            return ApiResponse::error(
                'Terjadi kesalahan saat membuat data.',
                9999,
                500,
                $e->getMessage()
            );
        }

        return ApiResponse::success(
            ['id_pakai' => $id_pakai],
            'Pemakaian berhasil diinput',
            0,
            201
        );
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

            return response()->json([
                'success' => true,
                'message' => 'Pemakaian berhasil dihapus.'
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'success' => false,
                    'message' => 'Data pemakaian ini sudah digunakan dan tidak dapat dihapus.'
                ], 409); // Conflict
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }

    public function pemakaianByMeteran(Request $request): JsonResponse
    {
        if (!$request->has('nomor_meteran') || empty($request->input('nomor_meteran'))) {
            return ApiResponse::error("Nomor meteran tidak boleh kosong.", "9002", 400);
        }

        try {
            $pemakaianQuery = Pemakaian::where('nomor_meteran', $request->input('nomor_meteran'))
                // --- Kondisional untuk Tahun ---
                ->when($request->tahun, function ($query, $tahun) {
                    return $query->where('tahun', $tahun);
                })
                // --- Kondisional untuk Bulan ---
                ->when($request->bulan, function ($query, $bulan) {
                    return $query->where('bulan', $bulan);
                })
                ->with(['meteran', 'tblbulan'])
                ->orderBy('tahun', 'desc')
                ->orderBy('bulan', 'desc');

            if ($request->has('start_date')) {
                $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
                $endDate = $request->has('end_date')
                    ? Carbon::parse($request->input('end_date'))->endOfDay()
                    : Carbon::now()->endOfDay();

                // Menggunakan whereBetween pada created_at, atau sesuaikan dengan kolom tanggal
                $pemakaianQuery->whereBetween('created_at', [$startDate, $endDate]);
            }

            // Eksekusi query setelah semua kondisi diterapkan
            $pemakaian = $pemakaianQuery->paginate(10);

            if ($pemakaian->isEmpty()) {
                return ApiResponse::error("Tidak ada data pemakaian untuk kriteria ini.", "2001", 404);
            }

            return ApiResponse::success(['pemakaian' => $pemakaian], "Data pemakaian berhasil diambil.", "0000", 200);

        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database: " . $e->getMessage(), "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui: " . $e->getMessage(), "9999", 500);
        }
    }
}
