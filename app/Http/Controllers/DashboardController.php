<?php

namespace App\Http\Controllers;

use App\Models\Meteran;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Carbon\Carbon;
use Doctrine\DBAL\Schema\View;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemakaian::leftJoin('meteran', 'pemakaian.nomor_meteran', '=', 'meteran.nomor_meteran')
            ->leftJoin('pelanggan', 'meteran.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->select(
                'pelanggan.nama_pelanggan AS nama_pelanggan',
                'pemakaian.nomor_meteran AS nomor_meteran',
                'meteran.id_pelanggan AS id_pelanggan',
                FacadesDB::raw('COUNT(pemakaian.bulan) AS jumlah_bulan'),
                FacadesDB::raw('SUM(pemakaian.pakai) AS total_pakai')
            )
            ->where('pemakaian.status_pembayaran', 0)
            ->groupBy(
                'pelanggan.nama_pelanggan',
                'pemakaian.nomor_meteran',
                'meteran.id_pelanggan'
            )
            ->having(FacadesDB::raw('COUNT(pemakaian.bulan)'), '>', 1)
            ->paginate(10);

        $pemakaian = $query;

        $pelanggan = Pelanggan::where('status', 1)
            ->count('id_pelanggan');

        $meteran = Meteran::where('status', 1)
            ->count('nomor_meteran');

        $totaltagihan = Tagihan::where('status_tagihan', 1)
            ->count('id_tagihan');


        $totalNominal = Pembayaran::whereMonth('waktu_pembayaran', Carbon::now()->month)
            ->whereYear('waktu_pembayaran', Carbon::now()->year)
            ->sum('total_nominal');

        $pembayaran = Pembayaran::orderBy('waktu_pembayaran', 'asc')->paginate(10);


        if ($request->header('HX-Request')) {
            return view('pemakaian.includes.index-table', compact('pemakaian'));
        }
        return view('dashboard', compact('pemakaian', 'pelanggan', 'meteran', 'totaltagihan', 'totalNominal', 'pembayaran'));
    }

    public function showTunggakan($id)
    {

        $tunggakan = Pemakaian::leftJoin('meteran', 'pemakaian.nomor_meteran', '=', 'meteran.nomor_meteran')
            ->leftJoin('pelanggan', 'meteran.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->select(
                'pelanggan.nama_pelanggan AS nama_pelanggan',
                'pemakaian.nomor_meteran AS nomor_meteran',
                'meteran.id_pelanggan AS id_pelanggan',
                FacadesDB::raw('COUNT(pemakaian.bulan) AS jumlah_bulan'),
                FacadesDB::raw('SUM(pemakaian.pakai) AS total_pakai')
            )
            ->where('meteran.nomor_meteran', $id)
            ->groupBy('pelanggan.nama_pelanggan')
            ->groupBy('pemakaian.nomor_meteran')
            ->groupBy('meteran.id_pelanggan')
            ->first();

        $detailTunggakan = Pemakaian::where('nomor_meteran', $id)
            ->where('status_pembayaran', 0)
            ->get();


        return view('tunggakan.show', compact('tunggakan', 'detailTunggakan'));
    }
}
