<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\View\View;
use App\Models\AreaPetugas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class AreaPetugasController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:area-petugas view', only: ['index', 'show']),
            new Middleware('permission:area-petugas create', only: ['create', 'store']),
            new Middleware('permission:area-petugas edit', only: ['edit', 'update']),
            new Middleware('permission:area-petugas delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = AreaPetugas::query();

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
        $query->with('petugas');

        $areaPetugas = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('area-petugas.includes.index-table', compact('areaPetugas'));
        }

        return view('area-petugas.index', compact('areaPetugas', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $areaPetugas = new AreaPetugas();
        $petugas = Petugas::all();

        return view('area-petugas.create', compact('areaPetugas', 'petugas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_area' => 'required|unique:area_petugas|string|max:50',
            'id_petugas' => 'required|integer',
            'keterangan' => 'required|string|max:255',
        ]);

        try {
            AreaPetugas::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('area-petugas.index')
            ->with('success', 'Area Petugas berhasil dibuat');
    }

    public function show($id): View
    {
        $areaPetugas = AreaPetugas::find($id);
        return view('area-petugas.show', compact('areaPetugas'));
    }

    public function edit($id): View
    {
        $areaPetugas = AreaPetugas::find($id);
        return view('area-petugas.edit', compact('areaPetugas'));
    }

    public function update(Request $request, AreaPetugas $areaPetugas): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_area' => 'required|unique:area_petugas|string|max:50',
            'id_petugas' => 'required|integer',
            'keterangan' => 'required|string|max:255',
        ]);

        try {
            $areaPetugas->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data area petugas ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('area-petugas.index')
            ->with('success', 'Area Petugas berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $areaPetugas = AreaPetugas::find($id);
        try {
            $areaPetugas->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('area-petugas.index')
                    ->with('error', 'Data area petugas ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('area-petugas.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('area-petugas.index')
            ->with('success', 'Area Petugas berhasil dihapus');
    }
}
