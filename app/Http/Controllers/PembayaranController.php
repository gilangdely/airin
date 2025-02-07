<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use Carbon\Carbon;
use App\Models\Tagihan;
use Illuminate\View\View;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\DetailTagihan;
use App\Models\Pemakaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PembayaranController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pembayaran view', only: ['index', 'show']),
            new Middleware('permission:pembayaran create', only: ['create', 'store']),
            new Middleware('permission:pembayaran edit', only: ['edit', 'update']),
            new Middleware('permission:pembayaran delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Pembayaran::query();

        // tambahkan kolom yang mau dikecualikan di pencarian
        $except = ['created_by', 'updated_by'];

        $columns = collect($query->getModel()->getFillable())->filter(function ($item) use ($except) {
            return !in_array($item, $except);
        })->toArray();

        $selectedColumns = $request->get('col', $columns);

        if ($search = $request->get('search')) {
            $query->where(function ($query) use ($search, $selectedColumns) {
                foreach ($selectedColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        }

        $pembayaran = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('pembayaran.includes.index-table', compact('pembayaran'));
        }

        return view('pembayaran.index', compact('pembayaran', 'columns', 'selectedColumns'));
    }

    public function create(Tagihan $tagihan): View
    {
        $pembayaran = new Pembayaran();
        $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();

        return view('pembayaran.create', compact('pembayaran', 'tagihan', 'detailtagihan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_tagihan' => 'required|integer',
            'id_meteran' => 'required|integer',
            'id_bulan' => 'required|string|max:3',
            'tahun' => 'required|integer',
            'total_nominal' => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:50',
            'catatan' => 'nullable|string',
            'petugas' => 'required|string|max:50',
        ]);

        $validatedData['id_pembayaran'] = strtolower(Auth::user()->name).'-'.$request->id_tagihan.Carbon::now()->format('Y-m-d-H:i:s');
        $validatedData['waktu_pembayaran'] = now();
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_by'] = Auth::id();

        $tagihan = Tagihan::find($request->id_tagihan);
        $tagihan->status_tagihan=0;
        $tagihan->status_pembayaran=1;

        //siapkan data untuk input detail pembayaran
        $detailtagihan = DetailTagihan::with('pemakaian')->where('id_tagihan',$request->id_tagihan)->get();
        $detailbayar = [];
        foreach($detailtagihan as $detail){
            $detailbayar[]=[
                'id_pembayaran' => $validatedData['id_pembayaran'],
                'id_pakai' => $detail->id_pakai,
                'id_bulan' => $detail->pemakaian->bulan,
                'tahun' => $detail->pemakaian->tahun,
                'pakai' => $detail->pakai,
                'tarif' => $detail->tarif,
                'subtotal' => $detail->subtotal
            ];
        }

        //ambil id_pakai untuk diupdate status bayarnya
        $getIdPakai = $detailtagihan->pluck('id_pakai')->toArray();

        try {
            Pembayaran::create($validatedData);

            DetailPembayaran::insert($detailbayar);

            $tagihan->update(); //update juga informasi tagihannya

            //update status pembayaran di table pemakaian
            Pemakaian::whereIn('id_pakai', $getIdPakai)->update(['status_pembayaran' => 1]);

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.')
                ->with('error', $e->getMessage());
        }

        return redirect()->route('tagihan.show',$request->id_tagihan)
            ->with('success', 'Pembayaran berhasil dibuat');
    }

    public function show(Pembayaran $pembayaran): View
    {
        $detailpembayaran = DetailPembayaran::where('id_pembayaran',$pembayaran->id_pembayaran)->get();
        return view('pembayaran.show', compact('pembayaran','detailpembayaran'));
    }
 
    public function edit(Pembayaran $pembayaran): View
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_tagihan' => 'required|integer',
            'id_meteran' => 'required|integer',
            'id_bulan' => 'required|string|max:3',
            'tahun' => 'required|integer',
            'total_nominal' => 'required|numeric',
            'waktu_pembayaran' => 'required|date_format:Y-m-d H:i:s',
            'metode_pembayaran' => 'required|string|max:50',
            'catatan' => 'required|string',
            'petugas' => 'required|string|max:50',
        ]);

        try {
            $pembayaran->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data pembayaran ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy(Pembayaran $pembayaran): RedirectResponse
    {
        try {
            $pembayaran->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pembayaran.index')
                    ->with('error', 'Data pembayaran ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pembayaran.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus');
    }

    public function cetakkuitansi(Pembayaran $pembayaran) : View
    {
        $detailpembayaran = DetailPembayaran::where('id_pembayaran', $pembayaran->id_pembayaran)->get();
        return view('pembayaran.cetakkuitansi', compact('pembayaran','detailpembayaran'));
    }
}
