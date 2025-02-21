<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class RekapPembayaran extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:rekap view', only: ['index'])
        ];
    }

    public function index(Request $request)
    {
        // Ambil nilai filter dari request
        $namaLayanan = $request->input('nama_layanan');
        $tanggalAwal = $request->input('awal');
        $tanggalAkhir = $request->input('akhir');

        // Query untuk mendapatkan daftar layanan untuk dropdown
        $layananList = DB::table('layanan')->select('id_layanan', 'nama_layanan')->get();

        // Jika nama_layanan diberikan, cari id_layanan
        if ($namaLayanan) {
            $layanan = DB::table('layanan')->where('nama_layanan', $namaLayanan)->first();
            if ($layanan) {
                $idLayanan = $layanan->id_layanan;
            } else {
                return redirect()->route('rekap.index')->with('error', 'Layanan tidak ditemukan');
            }
        } else {
            $idLayanan = null;
        }

        // Query utama dengan filter
        $query = DB::table('pembayaran')
            ->select('layanan.id_layanan', 'layanan.nama_layanan',
                DB::raw('COUNT(DISTINCT pembayaran.id_pembayaran) AS jumlah_pembayaran'),
                DB::raw('SUM(detail_pembayaran.subtotal) AS total_pembayaran'))
            ->join('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')
            ->join('pemakaian', 'detail_pembayaran.id_pakai', '=', 'pemakaian.id_pakai')
            ->join('meteran', 'pemakaian.nomor_meteran', '=', 'meteran.nomor_meteran')
            ->join('layanan', 'meteran.id_layanan', '=', 'layanan.id_layanan')
            ->groupBy('layanan.id_layanan', 'layanan.nama_layanan');

        // Tambahkan filter berdasarkan tanggal
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('pembayaran.waktu_pembayaran', [$tanggalAwal . ' 00:00:00', $tanggalAkhir . ' 23:59:59']);
        } elseif ($tanggalAwal) {
            $query->where('pembayaran.waktu_pembayaran', '>=', $tanggalAwal . ' 00:00:00');
        } elseif ($tanggalAkhir) {
            $query->where('pembayaran.waktu_pembayaran', '<=', $tanggalAkhir . ' 23:59:59');
        } 
        // Tambahkan filter jika ada
        if ($idLayanan) {
            $query->where('layanan.id_layanan', $idLayanan);
        }

        $results = $query->get();
        
        $grandJumlahPembayaran = $results->sum('jumlah_pembayaran');
        $grandTotal = $results->sum('total_pembayaran');

        return view('rekap.index', compact('results', 'layananList', 'grandTotal','grandJumlahPembayaran'));
    }
}
