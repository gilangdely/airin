<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\JsonResponse;

class PembayaranController extends Controller
{

    public function PembayaranByid($id): JsonResponse
    {
        try {
            $data = Pembayaran::where('nomor_meteran', $id)
                ->with(['meteran', 'bulan', 'detail_pembayarans', 'meteran.pelanggan', 'detail_pembayarans.bulan', 'meteran.layanan'])
                ->get();

            if ($data->isEmpty()) {
                return ApiResponse::error("Data pemakaian tidak ditemukan.", "2001", 404);
            }

            return ApiResponse::success($data, "Data pemakaian ditemukan.", "0000", 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return ApiResponse::error("Kesalahan database.", "9999", 500);
        } catch (\Exception $e) {
            return ApiResponse::error("Terjadi kesalahan yang tidak diketahui.", "9999", 500);
        }
    }
}
