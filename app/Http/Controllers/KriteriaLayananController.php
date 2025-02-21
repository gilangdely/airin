<?php

namespace App\Http\Controllers;

use App\Models\KriteriaLayanan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class KriteriaLayananController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:kriteria-layanan view', only: ['index', 'show']),
            new Middleware('permission:kriteria-layanan create', only: ['create', 'store']),
            new Middleware('permission:kriteria-layanan edit', only: ['edit', 'update']),
            new Middleware('permission:kriteria-layanan delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = KriteriaLayanan::query();

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

        $kriteriaLayanan = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('kriteria-layanan.includes.index-table', compact('kriteriaLayanan'));
        }

        return view('kriteria-layanan.index', compact('kriteriaLayanan', 'columns', 'selectedColumns'));
    }

    public function create($id_layanan): View
    {
        $kriteriaLayanan = new KriteriaLayanan();

        return view('kriteria-layanan.create', compact('kriteriaLayanan','id_layanan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_layanan' => 'required|integer',
            'kriteria' => 'required|string|max:100'
        ]);

        try {
            KriteriaLayanan::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('layanan.show',$request->id_layanan)
            ->with('success', 'Kriteria Layanan berhasil dibuat');
    }
 
    public function show(KriteriaLayanan $kriteriaLayanan): View
    {
        return view('kriteria-layanan.show', compact('kriteriaLayanan'));
    }

    public function edit(KriteriaLayanan $kriteriaLayanan): View
    {
        return view('kriteria-layanan.edit', compact('kriteriaLayanan'));
    }

    public function update(Request $request, KriteriaLayanan $kriteriaLayanan): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_layanan' => 'required|integer',
            'kriteria' => 'required|string|max:100'
        ]);

        try {
            $kriteriaLayanan->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data kriteria layanan ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('layanan.show',$kriteriaLayanan->id_layanan)
            ->with('success', 'Kriteria Layanan berhasil diperbarui');
    }

    public function destroy(KriteriaLayanan $kriteriaLayanan): RedirectResponse
    {
        try {
            $id_layanan = $kriteriaLayanan->id_layanan;
            $kriteriaLayanan->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('kriteria-layanan.index')
                    ->with('error', 'Data kriteria layanan ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('kriteria-layanan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('layanan.show',$id_layanan)
            ->with('success', 'Kriteria Layanan berhasil dihapus');
    }
}
