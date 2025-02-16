<?php

namespace App\Http\Controllers;

use App\Models\Meteran;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\View;
use Woo\GridView\DataProviders\EloquentDataProvider;

class LaporanPelangganController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:layanan view', only: ['index', 'show']),
            new Middleware('permission:layanan create', only: ['create', 'store']),
            new Middleware('permission:layanan edit', only: ['edit', 'update']),
            new Middleware('permission:layanan delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $query = Meteran::query();

        $except = ['created_by', 'updated_by'];

        $query->where('meteran.nomor_meteran', '=', $request->get('search'))
            ->join('pelanggan', 'meteran.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->join('layanan', 'meteran.id_layanan', '=', 'layanan.id_layanan')
            ->join('pembayaran', 'meteran.nomor_meteran', '=', 'pembayaran.nomor_meteran')
            ->join('bulan', 'pembayaran.id_bulan', '=', 'bulan.id_bulan');

        $meteran = $query->paginate(10);

        // return response($meteran);

        if ($request->header('HX-Request')) {
            return view('laporan-pelanggan.includes.index-table', compact('meteran'));
        }

        return view('laporan-pelanggan.index', compact('meteran'));
    }
}
