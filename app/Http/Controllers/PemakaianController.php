<?php

namespace App\Http\Controllers;

use App\Models\Meteran;
use App\Models\Pemakaian;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PemakaianController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pemakaian view', only: ['index', 'show']),
            new Middleware('permission:pemakaian create', only: ['create', 'store']),
            new Middleware('permission:pemakaian edit', only: ['edit', 'update']),
            new Middleware('permission:pemakaian delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Pemakaian::query()->with(['meteran','tblbulan']);

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

                $query->orWhereHas('meteran', function ($q) use ($search) {
                    $q->where('nomor_meteran', 'like', '%' . $search . '%');
                });

                $query->orWhereHas('tblbulan', function ($q) use ($search) {
                    $q->where('nama_bulan', 'like', '%' . $search . '%');
                });
            });
        }

        $pemakaian = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('pemakaian.includes.index-table', compact('pemakaian'));
        }

        return view('pemakaian.index', compact('pemakaian', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $pemakaian = new Pemakaian();

        return view('pemakaian.create', compact('pemakaian'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_meteran' => 'required|integer',
            'bulan' => 'required|string|max:3',
            'tahun' => 'required|string|max:4',
            'akhir' => 'required|integer',
        ]);

        $th = substr($request->tahun,2,2);
        $bl = $request->bulan;
        $id_meteran = $request->id_meteran;
        $id_pakai = "TRX".$th.$bl.$id_meteran;

        $validatedData['id_pakai'] = $id_pakai;
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_by'] = Auth::id();

        //ambil pemakaian terakhir dari data sebelumnya
        $pemakaian = Pemakaian::where('bulan',($bl-1))->latest('created_at')->first();
        $pemakaiansebelumnya = $pemakaian->akhir ?? 0;
        $validatedData['awal'] = $pemakaiansebelumnya;
        $validatedData['pakai'] = (intval($request->akhir) - intval($pemakaiansebelumnya));

        $meteran = Meteran::with('layanan')->where('id_meteran',$id_meteran)->first();

        $validatedData['id_layanan'] = $meteran->id_layanan;
        $validatedData['deskripsi'] = $meteran->layanan->nama_layanan;
        
        try {
            Pemakaian::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('pemakaian.index')
            ->with('success', 'Pemakaian berhasil dibuat');
    }

    public function show(Pemakaian $pemakaian): View
    {
        return view('pemakaian.show', compact('pemakaian'));
    }

    public function edit(Pemakaian $pemakaian): View
    {
        return view('pemakaian.edit', compact('pemakaian'));
    }

    public function update(Request $request, Pemakaian $pemakaian): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_meteran' => 'required|integer',
            'bulan' => 'required|string|max:3',
            'tahun' => 'required|string|max:4',
            'akhir' => 'required|integer',
        ]);

        $validatedData['updated_by'] = Auth::id();
        $validatedData['pakai'] = (intval($pemakaian->akhir) - intval($pemakaian->awal));

        try {
            $pemakaian->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data pemakaian ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pemakaian.index')
            ->with('success', 'Pemakaian berhasil diperbarui');
    }

    public function destroy(Pemakaian $pemakaian): RedirectResponse
    {
        try {
            $pemakaian->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pemakaian.index')
                    ->with('error', 'Data pemakaian ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pemakaian.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pemakaian.index')
            ->with('success', 'Pemakaian berhasil dihapus');
    }
}
