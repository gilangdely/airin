<?php

namespace App\Http\Controllers;

use App\Models\TarifLayanan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class TarifLayananController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:tarif-layanan view', only: ['index', 'show']),
            new Middleware('permission:tarif-layanan create', only: ['create', 'store']),
            new Middleware('permission:tarif-layanan edit', only: ['edit', 'update']),
            new Middleware('permission:tarif-layanan delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = TarifLayanan::query();

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

        $tarifLayanan = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('tarif-layanan.includes.index-table', compact('tarifLayanan'));
        }

        return view('tarif-layanan.index', compact('tarifLayanan', 'columns', 'selectedColumns'));
    }

    public function create($id_layanan): View
    {
        $tarifLayanan = new TarifLayanan();

        return view('tarif-layanan.create', compact('tarifLayanan', 'id_layanan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_layanan' => 'required|integer',
            'tier' => 'required|string|max:10',
            'min_pemakaian' => 'required|integer',
            'max_pemakaian' => 'nullable|integer',
            'tarif' => 'required|numeric',
        ]);

        try {
            TarifLayanan::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('layanan.show',$request->id_layanan)
            ->with('success', 'Tarif Layanan berhasil dibuat');
    }

    public function show(TarifLayanan $tarifLayanan): View
    {
        return view('tarif-layanan.show', compact('tarifLayanan'));
    }

    public function edit(TarifLayanan $tarifLayanan): View
    {
        return view('tarif-layanan.edit', compact('tarifLayanan'));
    }

    public function update(Request $request, TarifLayanan $tarifLayanan): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_layanan' => 'required|integer',
            'tier' => 'required|string|max:10',
            'min_pemakaian' => 'required|integer',
            'max_pemakaian' => 'nullable|integer',
            'tarif' => 'required|numeric',
        ]);

        try {
            $tarifLayanan->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data tarif layanan ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('layanan.show',$request->id_layanan)
            ->with('success', 'Tarif Layanan berhasil diperbarui');
    }

    public function destroy(TarifLayanan $tarifLayanan): RedirectResponse
    {
        try {
            $id_layanan = $tarifLayanan->id_layanan;
            $tarifLayanan->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('tarif-layanan.index')
                    ->with('error', 'Data tarif layanan ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('tarif-layanan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('layanan.show',$id_layanan)
            ->with('success', 'Tarif Layanan berhasil dihapus');
    }
}
