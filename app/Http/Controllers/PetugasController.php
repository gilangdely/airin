<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PetugasController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:petugas view', only: ['index', 'show']),
            new Middleware('permission:petugas create', only: ['create', 'store']),
            new Middleware('permission:petugas edit', only: ['edit', 'update']),
            new Middleware('permission:petugas delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Petugas::query();

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
        
        $petugas = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('petugas.includes.index-table', compact('petugas'));
        }

        return view('petugas.index', compact('petugas', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $petugas = new Petugas();

        return view('petugas.create', compact('petugas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            	'nama_lengkap' => 'required|string|max:255',
	'nomor_induk_petugas' => 'nullable|string|max:255',
	'nomor_telepon' => 'nullable|string|max:255',
	'alamat' => 'nullable|string',
        ]);

        try {
            Petugas::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil dibuat');
    }

    public function show(Petugas $petugas): View
    {
        return view('petugas.show', compact('petugas'));
    }

    public function edit(Petugas $petugas): View
    {
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas): RedirectResponse
    {
        $validatedData = $request->validate([
            	'nama_lengkap' => 'required|string|max:255',
	'nomor_induk_petugas' => 'nullable|string|max:255',
	'nomor_telepon' => 'nullable|string|max:255',
	'alamat' => 'nullable|string',
        ]);

        try {
            $petugas->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data petugas ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy(Petugas $petugas): RedirectResponse
    {
        try {
            $petugas->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('petugas.index')
                    ->with('error', 'Data petugas ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('petugas.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('petugas.index')
            ->with('success', 'Petugas berhasil dihapus');
    }
}