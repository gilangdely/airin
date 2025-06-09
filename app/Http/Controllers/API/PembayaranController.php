<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    
    public function PembayaranByid($id): JsonResponse
    {
        $data = Pembayaran::where('nomor_meteran', $id)
            ->with(['meteran', 'bulan','detail_pembayarans','meteran.pelanggan','detail_pembayarans.bulan','meteran.layanan'])
            ->get();
        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'Data pemakaian tidak ditemukan',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'Data pemakaian ditemukan',
            'data' => $data,
        ], 200);
    }
}
