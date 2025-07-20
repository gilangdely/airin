<?php

namespace App\Http\Controllers;

use App\Models\Meteran;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Carbon\Carbon;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Filter tahun (default: sekarang)
        $selectedYear = $request->input('tahun', Carbon::now()->year);

        // Ambil daftar tahun dari 2020 sampai sekarang
        $tahunList = range(2020, Carbon::now()->year);

        // Query pemakaian belum dibayar
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

        $pelanggan = Pelanggan::where('status', 1)->count();
        $meteran = Meteran::where('status', 1)->count();
        $totaltagihan = Tagihan::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $tagihanBelumLunas = Tagihan::where('status_tagihan', 1)->count();
        $totalNominal = Pembayaran::whereMonth('waktu_pembayaran', Carbon::now()->month)->whereYear('waktu_pembayaran', Carbon::now()->year)->sum('total_nominal');
        $pembayaran = Pembayaran::orderBy('waktu_pembayaran', 'desc')->paginate(10);

        // Ambil total pembayaran per bulan untuk tahun yang dipilih
        $dataPembayaran = Pembayaran::selectRaw('MONTH(waktu_pembayaran) as bulan, SUM(total_nominal) as total')
            ->whereYear('waktu_pembayaran', $selectedYear)
            ->groupByRaw('MONTH(waktu_pembayaran)')
            ->orderByRaw('MONTH(waktu_pembayaran)')
            ->get()
            ->keyBy('bulan');

        $dataTagihan = Tagihan::selectRaw('MONTH(created_at) as bulan, SUM(nominal) as total')
            ->whereYear('created_at', $selectedYear)
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get()
            ->keyBy('bulan');

        $totalTagihanPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalTagihanPerBulan[] = $dataTagihan[$i]->total ?? 0;
        }

        $totalPembayaranPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalPembayaranPerBulan[] = $dataPembayaran[$i]->total ?? 0;
        }

        // Data tagihan per bulan
        $tagihanData = Tagihan::selectRaw('id_bulan, COUNT(id_tagihan) as total')
            ->where('tahun', $selectedYear)
            ->groupBy('id_bulan')
            ->orderBy('id_bulan')
            ->get()
            ->keyBy('id_bulan');

        // Data pembayaran per bulan
        $pembayaranData = Pembayaran::selectRaw('id_bulan, COUNT(id_pembayaran) as total')
            ->where('tahun', $selectedYear)
            ->groupBy('id_bulan')
            ->orderBy('id_bulan')
            ->get()
            ->keyBy('id_bulan');

        // Siapkan array 12 bulan untuk masing-masing data
        $dataTagihan = [];
        $dataPembayaran = [];

        for ($i = 1; $i <= 12; $i++) {
            $dataTagihan[] = $tagihanData[$i]->total ?? 0;
            $dataPembayaran[] = $pembayaranData[$i]->total ?? 0;
        }

        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        if ($request->header('HX-Request')) {
            return view('pemakaian.includes.index-table', compact('pemakaian'));
        }

        // Total pembayaran bulan sebelumnya
        $lastMonth = Carbon::now()->subMonth();
        $totalNominalLastMonth = Pembayaran::whereMonth('waktu_pembayaran', $lastMonth->month)
            ->whereYear('waktu_pembayaran', $lastMonth->year)
            ->sum('total_nominal');

        // Hitung persentase perubahan
        if ($totalNominalLastMonth > 0) {
            $persentasePerubahan = (($totalNominal - $totalNominalLastMonth) / $totalNominalLastMonth) * 100;
        } else {
            $persentasePerubahan = $totalNominal > 0 ? 100 : 0;
        }


        return view('dashboard', compact(
            'pemakaian',
            'pelanggan',
            'meteran',
            'totaltagihan',
            'totalNominal',
            'pembayaran',
            'tagihanBelumLunas',
            'totalTagihanPerBulan',
            'totalPembayaranPerBulan',
            'bulanLabels',
            'tahunList',
            'selectedYear',
            'dataTagihan',
            'dataPembayaran',
            'persentasePerubahan'
        ));
    }

    public function grafikPembayaran(Request $request)
    {
        $selectedYear = $request->input('tahun', Carbon::now()->year);

        // Data total pembayaran per bulan
        $dataPembayaran = Pembayaran::selectRaw('MONTH(waktu_pembayaran) as bulan, SUM(total_nominal) as total')
            ->whereYear('waktu_pembayaran', $selectedYear)
            ->groupByRaw('MONTH(waktu_pembayaran)')
            ->orderByRaw('MONTH(waktu_pembayaran)')
            ->get()
            ->keyBy('bulan');

        $grafikData = [];
        for ($i = 1; $i <= 12; $i++) {
            $grafikData[] = $dataPembayaran[$i]->total ?? 0;
        }

        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        return view('dashboard.includes.chart', compact('selectedYear', 'grafikData', 'bulanLabels'));
    }

    public function getDataChartPerbandingan(Request $request)
    {
        $selectedYear = $request->input('tahun', Carbon::now()->year);

        // Data tagihan per bulan
        $tagihanData = Tagihan::selectRaw('id_bulan, COUNT(id_tagihan) as total')
            ->where('tahun', $selectedYear)
            ->groupBy('id_bulan')
            ->orderBy('id_bulan')
            ->get()
            ->keyBy('id_bulan');

        // Data pembayaran per bulan
        $pembayaranData = Pembayaran::selectRaw('id_bulan, COUNT(id_pembayaran) as total')
            ->where('tahun', $selectedYear)
            ->groupBy('id_bulan')
            ->orderBy('id_bulan')
            ->get()
            ->keyBy('id_bulan');

        // Siapkan array 12 bulan untuk masing-masing data
        $dataTagihan = [];
        $dataPembayaran = [];

        for ($i = 1; $i <= 12; $i++) {
            $dataTagihan[] = $tagihanData[$i]->total ?? 0;
            $dataPembayaran[] = $pembayaranData[$i]->total ?? 0;
        }

        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        return view('dashboard.includes.chart-perbandingan', compact(
            'selectedYear',
            'bulanLabels',
            'dataTagihan',
            'dataPembayaran'
        ));
    }

    public function showTunggakan($id)
    {

        $tunggakan = Pemakaian::leftJoin('meteran', 'pemakaian.nomor_meteran', '=', 'meteran.nomor_meteran')
            ->leftJoin('pelanggan', 'meteran.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->select(
                'pelanggan.nama_pelanggan AS nama_pelanggan',
                'pemakaian.nomor_meteran AS nomor_meteran',
                'meteran.id_pelanggan AS id_pelanggan',
                DB::raw('COUNT(pemakaian.bulan) AS jumlah_bulan'),
                DB::raw('SUM(pemakaian.pakai) AS total_pakai')
            )
            ->where('pemakaian.status_pembayaran', 0)
            ->where('pemakaian.nomor_meteran', $id)
            ->groupBy(
                'pelanggan.nama_pelanggan',
                'pemakaian.nomor_meteran',
                'meteran.id_pelanggan'
            )
            ->having(DB::raw('COUNT(pemakaian.bulan)'), '>', 1)
            ->first(); // pakai first karena hanya satu meteran


        $detailTunggakan = Pemakaian::where('nomor_meteran', $id)
            ->where('status_pembayaran', 0)
            ->get();


        return view('tunggakan.show', compact('tunggakan', 'detailTunggakan'));
    }
}
