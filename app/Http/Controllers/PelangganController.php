<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PelangganController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pelanggan view', only: ['index', 'show']),
            new Middleware('permission:pelanggan create', only: ['create', 'store']),
            new Middleware('permission:pelanggan edit', only: ['edit', 'update']),
            new Middleware('permission:pelanggan delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Pelanggan::query();

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

        $pelanggan = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('pelanggan.includes.index-table', compact('pelanggan'));
        }

        return view('pelanggan.index', compact('pelanggan', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $pelanggan = new Pelanggan();

        return view('pelanggan.create', compact('pelanggan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:50',
            'no_ktp' => 'required|string|max:30',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'status' => 'required|boolean',
        ]);
        $validatedData['id_pelanggan'] = Pelanggan::generateId();

        try {
            Pelanggan::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dibuat');
    }

    public function show(Pelanggan $pelanggan): View
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan): View
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:50',
            'no_ktp' => 'required|string|max:30',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'status' => 'required|boolean',
        ]);

        try {
            $pelanggan->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data pelanggan ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy(Pelanggan $pelanggan): RedirectResponse
    {
        try {
            $pelanggan->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pelanggan.index')
                    ->with('error', 'Data pelanggan ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pelanggan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil dihapus');
    }
}
