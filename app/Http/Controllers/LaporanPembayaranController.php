<?php
namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class LaporanPembayaranController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:laporan-pembayaran view', only: ['index', 'show']),
        ];
    }

    public function index(Request $request)
    {
        $query = Pembayaran::query()
            ->join("tagihan", "tagihan.id_tagihan", "=", "pembayaran.id_tagihan")
            ->join("meteran", "meteran.nomor_meteran", "=", "pembayaran.nomor_meteran")
            ->join("layanan", "meteran.id_layanan", "=", "layanan.id_layanan")
            ->join("pelanggan", "pelanggan.id_pelanggan", "=", "meteran.id_pelanggan")
            ->select(
                "pembayaran.*",
                // "meteran.*",
                "pelanggan.*",
                "layanan.*"
            );

        $dataProvider = new EloquentDataProvider($query);
        $perPage = 15;

        return view('laporan-pembayaran.index', compact('dataProvider', 'perPage'))
            ->with('i', ($request->query('page', 1) - 1) * $perPage);
    }

    public function show(Pembayaran $pembayaran)
    {
        $detailPembayaran = DetailPembayaran::where('id_pembayaran', $pembayaran->id_pembayaran)->get();

        return view('laporan-pembayaran.show', compact('pembayaran', 'detailPembayaran'));
    }
}