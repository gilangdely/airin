<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Woo\GridView\DataProviders\EloquentDataProvider;

class LaporanPembayaranController extends Controller
{
    public function index(Request $request)
    {
        $dataProvider = new EloquentDataProvider(Pembayaran::query()->with(['tagihan']));
        $perPage = 15;

        return view('laporan-pembayaran.index', compact('dataProvider', 'perPage'))
            ->with('i', ($request->query('page', 1) - 1) * $perPage);
    }
}
