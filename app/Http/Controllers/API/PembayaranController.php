<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PembayaranController extends Controller
{

    public function PembayaranByMeteran(Request $request, $nomor_meteran)
    {
        if (empty($nomor_meteran)) {
            if ($request->wantsJson()) {
                return ApiResponse::error("Missing parameter meteran", "9002", 400);
            }
        }
        try {
            $interval = (int) $request->query('interval', 6); // default 6 bulan jika tidak diset
            $currentDate = now();
            $pastDate = $currentDate->copy()->subMonths($interval);
            $minPeriode = $pastDate->format('Ym'); // format YYYYMM

            $data = Pembayaran::where('nomor_meteran', $nomor_meteran)
                ->whereRaw("CONCAT(tahun, LPAD(id_bulan, 2, '0')) >= ?", [$minPeriode])
                ->with([
                    'meteran',
                    'bulan',
                    'detail_pembayarans',
                    'meteran.pelanggan',
                    'detail_pembayarans.bulan',
                    'meteran.layanan'
                ])
                ->get();

            // if ($data->isEmpty()) {
            //     if ($request->wantsJson()) {
            //         return ApiResponse::error("Data pembayaran tidak ditemukan.", "2001", 404);
            //     } else {
            //         return view('pembayaran.tidak_ditemukan');
            //     }
            // }

            if ($request->wantsJson()) {
                return ApiResponse::success($data, "Data pembayaran ditemukan.", "0000", 200);
            } else {
                return view('pembayaran.show', [
                    'pembayaran' => $data,
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($request->wantsJson()) {
                return ApiResponse::error("Kesalahan database.", "9999", 500);
            } else {
                return response()->view('errors.data    base', [], 500);
            }
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
            } else {
                return response()->view('errors.general', [], 500);
            }
        }
    }
}
