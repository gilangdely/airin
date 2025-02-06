<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\View\View;
use App\Models\TarifLayanan;
use Illuminate\Http\Request;
use App\Models\KriteriaLayanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class LayananController extends Controller implements HasMiddleware
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

    public function index(Request $request): View
    {
        $query = Layanan::query();

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
        
        $layanan = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('layanan.includes.index-table', compact('layanan'));
        }

        return view('layanan.index', compact('layanan', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $layanan = new Layanan();

        return view('layanan.create', compact('layanan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            	'nama_layanan' => 'required|string|max:25',
        ]);

        try {
            Layanan::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil dibuat');
    }

    public function show(Layanan $layanan): View
    {
        $kriterialayanan = KriteriaLayanan::where('id_layanan', $layanan->id_layanan)->get();
        $tariflayanan = TarifLayanan::where('id_layanan', $layanan->id_layanan)->get();
        return view('layanan.show', compact('layanan','kriterialayanan', 'tariflayanan'));
    }

    public function edit(Layanan $layanan): View
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan): RedirectResponse
    {
        $validatedData = $request->validate([
            	'nama_layanan' => 'required|string|max:25',
        ]);

        try {
            $layanan->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data layanan ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Layanan $layanan): RedirectResponse
    {
        try {
            $layanan->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('layanan.index')
                    ->with('error', 'Data layanan ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('layanan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('layanan.index')
            ->with('success', 'Layanan berhasil dihapus');
    }
}