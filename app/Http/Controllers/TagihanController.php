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
use DateTime;
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

    public function create(Meteran $meteran)
    {
        $now = new DateTime();

        //inisialisasi tagihan
        $tagihan = new Tagihan();

        //persiapkan informasi tagihan sementara
        $tagihan->bulan = $now->format('M');
        $tagihan->tahun = $now->format('Y');
        $tagihan->pelanggan = $meteran->pelanggan->nama_pelanggan;

        $pemakaianList = $pemakaian = Pemakaian::where('nomor_meteran', $meteran->nomor_meteran)
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
        

        if($tarifLayanan->isEmpty()){
            return redirect()->back()
                ->with('error', "Tidak ada tarif yang tersedia untuk layanan tersebut.");
        }

        $totalTagihan = 0;
        $rincianTagihan = [];

        foreach ($pemakaianList as $pemakaian) {
            $totalPakai = $pemakaian->pakai;
            $idLayanan = $pemakaian->id_layanan;

            // Ambil tarif sesuai layanan yang dipakai
            $tarifList = $tarifLayanan[$idLayanan] ?? collect();

            // Cari tarif yang sesuai untuk jumlah pemakaian ini
            $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                return $totalPakai >= $t->min_pemakaian &&
                    ($t->max_pemakaian === null || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian);
            });

            if (!$tarif) {
                return redirect()->back()
                ->with('error', "Tidak ada tarif yang cocok untuk pemakaian $totalPakai m³.");
            }

            // Hitung tagihan bulan ini
            $tagihanBulanIni = $totalPakai * $tarif->tarif;
            $totalTagihan += $tagihanBulanIni;

            // Simpan rincian tagihan
            $rincianTagihan[] = [
                'bulan' => $pemakaian->tblbulan->nama_bulan,
                'tahun' => $pemakaian->tahun,
                'id_pakai' => $pemakaian->id_pakai,
                'pakai' => $totalPakai,
                'tarif' => $tarif->tarif,
                'subtotal' => $tagihanBulanIni
            ];
        }

        // dd($rincianTagihan);

        return view('tagihan.create', compact('tagihan', 'rincianTagihan', 'totalTagihan', 'meteran'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_bulan' => 'required|string',
            'id_pelanggan' => 'required|string|max:50',
            'nomor_meteran' => 'required|max:10',
            'nominal' => 'required|numeric',
            'waktu_awal' => 'required|date',
            'waktu_akhir' => 'required|date'
        ]);


        $bulan = date('n', strtotime($request->id_bulan));
        $tahun = date('Y', strtotime($request->id_bulan));
        $nomor_meteran = $request->nomor_meteran;
        $id_pelanggan = $request->id_pelanggan;
        $waktu_awal = $request->waktu_awal;
        $waktu_akhir = $request->waktu_akhir;

        $tagihan = Tagihan::where('nomor_meteran', $nomor_meteran)
            ->where('id_bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('id_pelanggan', $id_pelanggan)
            ->where('status_pembayaran', 0) //jika status_pembayaran = 0 maka artinya belum dibayar
            ->where('status_tagihan', 1) //jika status-tagihan = 1 artinya tagihan masih aktif/belum dibayar
            ->get();

        if ($tagihan->isNotEmpty()) {
            return redirect()->back()
                ->with('error', 'Terdapat tagihan aktif di bulan ini!.');
        }

        $id_tagihan = $tahun . $bulan . $nomor_meteran . rand(100, 999);
        $datatagihan['id_tagihan'] = $id_tagihan;
        $datatagihan['id_bulan'] = $bulan;
        $datatagihan['tahun'] = $tahun;
        $datatagihan['id_pelanggan'] = $id_pelanggan;
        $datatagihan['nomor_meteran'] = $nomor_meteran;
        $datatagihan['waktu_awal'] = $waktu_awal;
        $datatagihan['waktu_akhir'] = $waktu_akhir;
        $datatagihan['status_tagihan'] = 1;
        $datatagihan['status_pembayaran'] = 0;
        $datatagihan['created_by'] = Auth::id();
        $datatagihan['updated_by'] = Auth::id();

        $pemakaianList = $pemakaian = Pemakaian::where('nomor_meteran', $nomor_meteran)
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

        // dd($tarifLayanan);

        $totalTagihan = 0;
        $rincianTagihan = [];

        foreach ($pemakaianList as $pemakaian) {
            $totalPakai = $pemakaian->pakai;
            $idLayanan = $pemakaian->id_layanan;

            // Ambil tarif sesuai layanan yang dipakai
            $tarifList = $tarifLayanan[$idLayanan] ?? collect();

            // Cari tarif yang sesuai untuk jumlah pemakaian ini
            $tarif = $tarifList->firstWhere(function ($t) use ($totalPakai) {
                return $totalPakai >= $t->min_pemakaian &&
                    ($t->max_pemakaian === null || $t->max_pemakaian == 0 || $totalPakai <= $t->max_pemakaian);
            });

            if (!$tarif) {
                // throw new \Exception("Tarif tidak ditemukan untuk pemakaian $totalPakai m³.");
                return redirect()->back()
                ->with('error', "Tarif tidak ditemukan untuk pemakaian $totalPakai m³.");
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

        $datatagihan['nominal'] = $totalTagihan;


        try {
            Tagihan::create($datatagihan);
            DetailTagihan::insert($rincianTagihan);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Terjadi kesalahan saat membuat data. | error : ' . $e->getMessage());
        }

        return redirect()->route('tagihan.index')
            ->with('success', 'Tagihan berhasil dibuat');
    }

    public function show(Tagihan $tagihan): View
    {
        $detailtagihan = DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->get();
        return view('tagihan.show', compact('tagihan', 'detailtagihan'));
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
            DetailTagihan::where('id_tagihan', $tagihan->id_tagihan)->delete();
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

        return [
            'total_tagihan' => $totalTagihan,
            'rincian' => $rincianTagihan
        ];
    }

    public function cekkartumeteran(){
        return view('tagihan.cekkartumeteran');
    }

    public function proseskartumeteran(Request $request){
        $nokartu = $request->rfid;
        dd($request);
        $meteran = Meteran::where('chip_kartu',$nokartu)->first();
        return response()->json($meteran);
    }
}
