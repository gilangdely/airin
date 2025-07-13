<?php

namespace App\Http\Controllers\API;

use App\Models\Meteran;
use App\Models\Petugas;
use App\Models\AreaPetugas;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomePetugasController extends Controller
{
    public function getMeteranByPetugas(Request $request)
    {
        if (!$request->has('nomor_induk_petugas') || empty($request->nomor_induk_petugas)) {
            return ApiResponse::error("Parameter Nomor Induk Petugas Tidak Ada", "9002", 401);
        }

        try {
            $no_petugas = $request->nomor_induk_petugas;
            $petugas = Petugas::where('nomor_induk_petugas', $no_petugas)->first();

            if (empty($petugas)) {
                return ApiResponse::error("Data Petugas Tidak Ditemukan", "2001", 200);
            }

            $id_petugas = $petugas->id;
            $area_petugas = AreaPetugas::where('id_petugas', $id_petugas)->first();
            $id_area = $area_petugas->id;

            $meteran = DB::select("
                        SELECT meteran.nomor_meteran, pelanggan.nama_pelanggan, layanan.nama_layanan, meteran.lokasi_pemasangan, meteran.tanggal_pemasangan, area_petugas.nama_area, meteran.status FROM meteran
                        INNER JOIN pelanggan ON meteran.id_pelanggan=pelanggan.id_pelanggan
                        INNER JOIN layanan ON meteran.id_layanan=layanan.id_layanan
                        INNER JOIN area_petugas ON meteran.id_area=area_petugas.id
                        WHERE meteran.id_area=:id_area
                        ", ['id_area' => $id_area]);
            
            // $meteran = Meteran::where('id_area', $id_area)->get();

            return ApiResponse::success($meteran,"Data Meteran berhasil diambil","0000", 200);
        } catch (\Throwable $th) {
            //throw $th;
            return ApiResponse::error("Gagal ambil data: ".$th, "9999",500);
        }
        
    }
}
