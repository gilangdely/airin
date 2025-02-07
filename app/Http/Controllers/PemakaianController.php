<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meteran;
use App\Models\Tagihan;
use App\Models\Pemakaian;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\DetailTagihan;
use Illuminate\Support\Facades\DB;
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
        $query = Pemakaian::query()->with(['meteran', 'tblbulan']);

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
            'bulan' => 'required',
            'akhir' => 'required|integer',
        ]);

        $inputbulan = $request->bulan;
        $replace_bln = str_replace("-", "", $inputbulan);

        $tanggal = Carbon::createFromFormat('Y-m', $inputbulan);
        $bulanSekarang = $tanggal->month;
        $tahunSekarang = $tanggal->year;
        $bulanSebelumnya = $tanggal->subMonth()->month;
        $tahunSebelumnya = $tanggal->year;

        //cek apakah sudah pernah menginputkan pemakaian untuk bulan yang diinputkan, jika sudah jangan lakukan input
        $cekpemakaian = Pemakaian::where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->first();

        if ($cekpemakaian) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Data sudah pernah diinputkan!.');
        }

        $id_meteran = $request->id_meteran;
        $id_pakai = "TRX" . $replace_bln . $id_meteran;

        //ambil pemakaian terakhir dari data sebelumnya
        $pemakaian = Pemakaian::where('bulan', $bulanSebelumnya)
            ->where('tahun', $tahunSebelumnya)
            ->latest('created_at')
            ->first();
        $pemakaiansebelumnya = $pemakaian->akhir ?? 0;

        $meteran = Meteran::with('layanan')->where('id_meteran', $id_meteran)->first();

        $validatedData['id_pakai'] = $id_pakai;
        $validatedData['id_meteran'] = $id_meteran;
        $validatedData['bulan'] = $bulanSekarang;
        $validatedData['id_layanan'] = $meteran->id_layanan;
        $validatedData['deskripsi'] = $meteran->layanan->nama_layanan;
        $validatedData['tahun'] = $tahunSekarang;
        $validatedData['awal'] = $pemakaiansebelumnya;
        $validatedData['akhir'] = $request->akhir;
        $validatedData['pakai'] = (intval($request->akhir) - intval($pemakaiansebelumnya));
        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_by'] = Auth::id();

        try {
            Pemakaian::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        //cek apakah sudah ada tagihan untuk bulan ini atau belum
        $tagihan = Tagihan::where('id_meteran', $meteran->id_meteran)
            ->where('id_bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->where('id_pelanggan', $meteran->id_pelanggan)
            ->where('status_pembayaran', 0) //jika status_pembayaran = 0 maka artinya belum dibayar
            ->where('status_tagihan', 1) //jika status-tagihan = 1 artinya tagihan masih aktif/belum dibayar
            ->get();

        // dd($tagihan);

        if ($tagihan->isNotEmpty()) {
            return redirect()->back()
                ->with('error', 'Terdapat tagihan aktif di bulan ini!.');
        }

        //siapkan data untuk tagihan
        $id_tagihan = $tahunSekarang . $bulanSekarang . $meteran->id_meteran . rand(100, 999);
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
