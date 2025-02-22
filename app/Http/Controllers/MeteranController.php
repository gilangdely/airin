<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Meteran;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class MeteranController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:meteran view', only: ['index', 'show']),
            new Middleware('permission:meteran create', only: ['create', 'store']),
            new Middleware('permission:meteran edit', only: ['edit', 'update']),
            new Middleware('permission:meteran delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Meteran::query();

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

        $meteran = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('meteran.includes.index-table', compact('meteran'));
        }

        return view('meteran.index', compact('meteran', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $meteran = new Meteran();
        $pelanggans = Pelanggan::where('status',1)->get();
        $layanans = Layanan::all();

        return view('meteran.create', compact('meteran','pelanggans','layanans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_pelanggan' => 'required|string|max:50',
            'nomor_meteran' => 'required|integer',
            'id_layanan' => 'required|integer',
            'lokasi_pemasangan' => 'required|string',
            'tanggal_pemasangan' => 'required|date',
            'status' => 'required|boolean',
        ]);

        try {
            Meteran::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('meteran.index')
            ->with('success', 'Meteran berhasil dibuat');
    }

    public function show(Meteran $meteran): View
    {
        return view('meteran.show', compact('meteran'));
    }

    public function edit(Meteran $meteran): View
    {
        $pelanggans = Pelanggan::where('status',1)->get();
        $layanans = Layanan::all();
        return view('meteran.edit', compact('meteran','pelanggans','layanans'));
    }

    public function update(Request $request, Meteran $meteran): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_pelanggan' => 'required|string|max:50',
            'nomor_meteran' => 'required|integer',
            'id_layanan' => 'required|integer',
            'lokasi_pemasangan' => 'required|string',
            'tanggal_pemasangan' => 'required|date',
            'status' => 'required|boolean',
        ]);

        try {
            $meteran->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data meteran ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('meteran.index')
            ->with('success', 'Meteran berhasil diperbarui');
    }
 
    public function destroy(Meteran $meteran): RedirectResponse
    {
        try {
            $meteran->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('meteran.index')
                    ->with('error', 'Data meteran ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('meteran.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('meteran.index')
            ->with('success', 'Meteran berhasil dihapus');
    }

    public function mapping(Request $request): RedirectResponse
    {
        $nomor_meteran = $request->nomor_meteran;
        $meteran = Meteran::find($nomor_meteran);
        $meteran->update(['chip_kartu' => $request->chip_kartu]);

        return redirect()->route('meteran.show', $nomor_meteran)
            ->with('success', 'Kartu berhasil dimapping!');
    }

    public function cetakkartu(Meteran $meteran) {
        
        return view('meteran.cetakkartu');
    }
}
