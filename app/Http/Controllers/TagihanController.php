<?php

namespace App\Http\Controllers;

use App\Models\DetailTagihan;
use Carbon\Carbon;
use App\Models\Meteran;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\View\View;
use App\Models\TarifLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class TagihanController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:tagihan view', only: ['index', 'show']),
            new Middleware('permission:tagihan create', only: ['create', 'store']),
            new Middleware('permission:tagihan edit', only: ['edit', 'update']),
            new Middleware('permission:tagihan delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Tagihan::query();

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

        $tagihan = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('tagihan.includes.index-table', compact('tagihan'));
        }

        return view('tagihan.index', compact('tagihan', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $tagihan = new Tagihan();

        return view('tagihan.create', compact('tagihan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_bulan' => 'required|string|max:3',
            'tahun' => 'required|integer',
            'id_pelanggan' => 'required|string|max:50',
            'nominal' => 'required|numeric',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date',
            'status_tagihan' => 'required|boolean',
            'status_pembayaran' => 'required|boolean',
        ]);

        try {
            Tagihan::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('tagihan.index')
            ->with('success', 'Tagihan berhasil dibuat');
    }

    public function show(Tagihan $tagihan): View
    {
        $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();
        return view('tagihan.show', compact('tagihan','detailtagihan'));
    }

    public function edit(Tagihan $tagihan): View
    {
        return view('tagihan.edit', compact('tagihan'));
    }

    public function update(Request $request, Tagihan $tagihan): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_bulan' => 'required|string|max:3',
            'tahun' => 'required|integer',
            'id_pelanggan' => 'required|string|max:50',
            'nominal' => 'required|numeric',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date',
            'status_tagihan' => 'required|boolean',
            'status_pembayaran' => 'required|boolean',
        ]);

        try {
            $tagihan->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput($request->all())
                    ->with('error', 'Data tagihan ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('tagihan.index')
            ->with('success', 'Tagihan berhasil diperbarui');
    }

    public function destroy(Tagihan $tagihan): RedirectResponse
    {
        try {
            $tagihan->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('tagihan.index')
                    ->with('error', 'Data tagihan ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('tagihan.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('tagihan.index')
            ->with('success', 'Tagihan berhasil dihapus');
    }


    public function cektagihanpelanggan(Meteran $meteran)
    {   
        $bulanSekarang = Carbon::now()->month;
        $tahunSekarang = Carbon::now()->year;

        //cek apakah sudah ada tagihan untuk bulan ini atau belum
        $tagihan = Tagihan::where('id_meteran', $meteran->id_meteran)
        ->where('id_bulan', $bulanSekarang)
        ->where('tahun', $tahunSekarang)
        ->where('id_pelanggan', $meteran->id_pelanggan)
        ->where('status_pembayaran', 0) //jika status_pembayaran = 0 maka artinya belum dibayar
        ->where('status_tagihan', 1) //jika status-tagihan = 1 artinya tagihan masih aktif/belum dibayar
        ->get();

        if($tagihan->isNotEmpty()){
            return redirect()->back()
                ->with('error', 'Terdapat tagihan aktif di bulan ini!.');
        }

        //siapkan data untuk tagihan
        $id_tagihan = $tahunSekarang.$bulanSekarang.$meteran->id_meteran.rand(100, 999);
        $tanggal_awal = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->startOfMonth()->toDateString();
        $tanggal_akhir = Carbon::createFromDate($tahunSekarang, $bulanSekarang, 1)->endOfMonth()->toDateString();

        $datatagihan['id_tagihan'] = $id_tagihan;
        $datatagihan['id_bulan'] = $bulanSekarang;
        $datatagihan['tahun'] = $tahunSekarang;
        $datatagihan['id_pelanggan'] = $meteran->id_pelanggan;
        $datatagihan['id_meteran'] = $meteran->id_meteran;
        $datatagihan['waktu_awal'] = $tanggal_awal;
        $datatagihan['waktu_akhir'] = $tanggal_akhir;
        $datatagihan['status_tagihan'] = 1;
        $datatagihan['status_pembayaran'] = 0;
        $datatagihan['created_by'] = Auth::id();
        $datatagihan['updated_by'] = Auth::id();

        try {
            Tagihan::create($datatagihan);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat membuat data tagihan.');
        }

        $pemakaianList = DB::table('pemakaian')
            ->where('id_meteran', $meteran->id_meteran)
            ->where('status_pembayaran', 0)
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        if ($pemakaianList->isEmpty()) {
            return redirect()->back()
                ->with('error', 'Tidak ada tagihan yang perlu dibayar.');
        }

        // Ambil semua ID layanan yang ada dalam pemakaian
        $idLayananList = $pemakaianList->pluck('id_layanan')->unique();

        // Ambil semua tarif untuk layanan yang digunakan
        $tarifLayanan = DB::table('tarif_layanan')
            ->whereIn('id_layanan', $idLayananList)
            ->orderBy('min_pemakaian', 'asc')
            ->get()
            ->groupBy('id_layanan');

        $totalTagihan = 0;
        $rincianTagihan = [];

        foreach ($pemakaianList as $pemakaian) {
            $totalPakai = $pemakaian->pakai;
            $idLayanan = $pemakaian->id_layanan;

            // Ambil tarif sesuai layanan yang dipakai
            $tarifList = $tarifLayanan[$idLayanan] ?? collect();

            // Cari tarif yang sesuai untuk jumlah pemakaian ini
            $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                return $t->min_pemakaian <= $totalPakai &&
                    ($t->max_pemakaian === null || $t->max_pemakaian >= $totalPakai);
            });

            if (!$tarif) {
                continue; // Skip jika tidak ada tarif yang cocok
            }

            // Hitung tagihan bulan ini
            $tagihanBulanIni = $totalPakai * $tarif->tarif;
            $totalTagihan += $tagihanBulanIni;

            // Simpan rincian tagihan
            $rincianTagihan[] = [
                'id_tagihan' => $id_tagihan,
                'id_pakai' => $pemakaian->id_pakai,
                'pakai' => $totalPakai,
                'tarif' => $tarif->tarif,
                'subtotal' => $tagihanBulanIni
            ];
        }

        DetailTagihan::insert($rincianTagihan);

        $tagihan = Tagihan::find($id_tagihan);
        $tagihan->nominal = $totalTagihan;
        $tagihan->update();

        return [
            'total_tagihan' => $totalTagihan,
            'rincian' => $rincianTagihan
        ];
    }
}
