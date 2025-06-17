<?php

namespace App\Http\Controllers\API;

use App\Models\Meteran;
use App\Models\Tagihan;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getunpaidinvoice(Request $request)
    {
        $unpaidtagihan = Tagihan::where('status_tagihan', 1)
            ->where('status_pembayaran', 0)
            ->where('nominal', '>', 0)
            ->get();

        return ApiResponse::success($unpaidtagihan, "Data Tagihan Berhasil Diambil", "0000", 200);
    }

    public function getmeteranbypelanggan(Request $request)
    {
        $idPelanggan = $request->idpelanggan;

        $meterans = Meteran::where('id_pelanggan', $idPelanggan)->with(['layanan', 'tagihan'])->get();

        // $tagihan = Tagihan::where('id_pelanggan', $idPelanggan)->with(['meteran','detailtagihan'])->get();

        $data = [
            'meterans' => $meterans,
        ];

        return ApiResponse::success($data, "Data Meteran Ditemukan", "0000", 200);
        // return response()->json($request->all(), 200);
    }

    public function gettagihanbymeteranaktif(Request $request)
    {
        $nomorMeteranAktif = $request->nomor_meteran;

        $query_gettagihan = "SELECT 
        meteran.nomor_meteran, 
        layanan.nama_layanan, 
        tagihan.nominal as nominal_tagihan, 
        bulan.nama_bulan, 
        tagihan.id_tagihan FROM meteran
            INNER JOIN layanan ON meteran.id_layanan=layanan.id_layanan
            INNER JOIN tagihan ON meteran.nomor_meteran=tagihan.nomor_meteran
            INNER JOIN bulan ON tagihan.id_bulan=bulan.id_bulan
            WHERE meteran.nomor_meteran=? 
            AND tagihan.status_tagihan=1 
            AND tagihan.status_pembayaran=0 
            AND tagihan.waktu_awal<=CURRENT_DATE 
            AND tagihan.waktu_akhir >= CURRENT_DATE";

        $tagihan = DB::selectOne($query_gettagihan, [$nomorMeteranAktif]);

        if (!$tagihan) {
            // Jika tidak ada tagihan aktif, langsung kembalikan error
            return ApiResponse::error("Tagihan aktif tidak ditemukan", "2001", 404);
        }
        $idTagihan = $tagihan->id_tagihan;

        $query_gettotalpakai = "SELECT SUM(pakai) as total_pakai FROM detail_tagihan WHERE id_tagihan=?";
        $total_pakai_obj = DB::selectOne($query_gettotalpakai, [$idTagihan]);

        $dataGabungan = (array)$tagihan;

        // Tambahkan field total_pakai ke dalam array gabungan
        // Beri nilai default 0 jika tidak ada data pemakaian
        $dataGabungan['total_pakai'] = $total_pakai_obj ? (int)$total_pakai_obj->total_pakai : 0;

        // Lakukan casting tipe data agar Flutter menerima format yang benar
        $dataGabungan['nominal_tagihan'] = (float)$dataGabungan['nominal_tagihan'];

        if (!empty($dataGabungan)) {
            return ApiResponse::success($dataGabungan, "Tagihan ditemukan", "0000", 200);
        } else {
            return ApiResponse::error("Tagihan tidak ditemukan", "2001", 404);
        }
    }
}
