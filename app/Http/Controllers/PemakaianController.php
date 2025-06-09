<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Meteran;
use App\Models\Tagihan;
use App\Models\Pemakaian;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\DetailTagihan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\Middleware;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

use function Laravel\Prompts\error;

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

    public function index(Request $request): View|JsonResponse
    {
        if ($request->wantsJson()) {
            $query = Pemakaian::query()->with(['meteran', 'tblbulan', 'meteran.pelanggan']);
        } else {
            $query = Pemakaian::query()->with(['meteran', 'tblbulan'])->orderBy('bulan', 'desc');
        }

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

        if ($request->wantsJson()) {
            return response()->json($pemakaian);
        }

        if ($request->header('HX-Request')) {
            return view('pemakaian.includes.index-table', compact('pemakaian'));
        }

        return view('pemakaian.index', compact('pemakaian', 'columns', 'selectedColumns'));
    }

    public function cekmeteran()
    {
        return view('pemakaian.cekmeteran');
    }

    public function storecekmeteran(Request $request)
    {
        $nomor_meteran = $request->nomor_meteran;
        $meteran = Meteran::find($nomor_meteran);

        if ($meteran) {
            return redirect()->route('pemakaian.create', $meteran);
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Nomor meteran tidak valid.');
        }
    }
    public function storecekchipkartu(Request $request)
    {
        $chip_kartu = $request->chip_kartu;
        $meteran = Meteran::where('chip_kartu', $chip_kartu)->first();

        if ($meteran) {
            return redirect()->route('pemakaian.create', $meteran);
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Kartu tidak terdaftar.');
        }
    }

    public function create(Meteran $meteran): View|JsonResponse
    {
        //ambil informasi bulan kemarin
        // $tanggalBulanKemarin = new DateTime();
        // $tanggalBulanKemarin->modify('first day of last month');
        // $bulanSebelumnya = $tanggalBulanKemarin->format('n'); // Angka bulan (1-12)
        // $tahunSebelumnya = $tanggalBulanKemarin->format('Y');

        $pemakaian = Pemakaian::where('nomor_meteran', $meteran->nomor_meteran)
            ->orderBy('bulan', 'desc') // Urutkan berdasarkan bulan terbaru
            ->first();

        if (request()->wantsJson()) {
            return response()->json(compact('meteran', 'pemakaian'));
        }

        //uncomment coding di atas ketika sudah production

        // $pemakaian = new Pemakaian();

        return view('pemakaian.create', compact('meteran', 'pemakaian'));
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        if (request()->wantsJson()) {
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
                return response()->json([
                    'error' => 'Data sudah pernah diinputkan!',
                    'input' => $request->all()
                ], 400);
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
                return response()->json([
                    'error' => 'Terjadi kesalahan saat membuat data.',
                    'input' => $request->all()
                ], 422);
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
                return response()->json([
                    'error' => 'Terdapat tagihan aktif di bulan ini!'
                ], 409);
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
                return response()->json([
                    'error' => 'Terjadi kesalahan saat membuat data tagihan.'
                ], 500);
            }

            $pemakaianList = DB::table('pemakaian')
                ->where('id_meteran', $meteran->id_meteran)
                ->where('status_pembayaran', 0)
                ->orderBy('tahun', 'asc')
                ->orderBy('bulan', 'asc')
                ->get();

            if ($pemakaianList->isEmpty()) {
                return response()->json([
                    'error' => 'Tidak ada tagihan yang perlu dibayar.'
                ], 400); // Kode status HTTP 404 untuk Not Found            
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

            return response()->json([
                'message' => 'Pemakaian berhasil dibuat'
            ], 200);
        }

        $validatedData = $request->validate([
            'nomor_meteran' => 'required|integer',
            'bulan' => 'required',
            'akhir' => 'required|integer',
        ]);

        $nomor_meteran = $request->nomor_meteran;
        $inputbulan = $request->bulan;

        // cek apakah bulan yang diinputkan itu bukan bulan depan
        $currentDate = Carbon::now()->format('Y-m');
        if ($inputbulan > $currentDate) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Dilarang menginputkan pemakaian untuk bulan depan!.');
        }

        $replace_bln = str_replace("-", "", $inputbulan);

        $tanggal = Carbon::createFromFormat('Y-m', $inputbulan);
        $bulanSekarang = $tanggal->month;
        $tahunSekarang = $tanggal->year;
        $bulanSebelumnya = $tanggal->subMonth()->month;
        $tahunSebelumnya = $tanggal->year;

        //cek apakah sudah pernah menginputkan pemakaian untuk bulan yang diinputkan, jika sudah jangan lakukan input
        $cekpemakaian = Pemakaian::where('bulan', $bulanSekarang)
            ->where('tahun', $tahunSekarang)
            ->where('nomor_meteran', $nomor_meteran)
            ->first();

        if ($cekpemakaian) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Data sudah pernah diinputkan!.');
        }



        //ambil pemakaian terakhir sesuai dengan nomor_meteran dari data sebelumnya
        $pemakaian = Pemakaian::where('nomor_meteran', $nomor_meteran)
            ->where('bulan', $bulanSebelumnya)
            ->where('tahun', $tahunSebelumnya)
            ->latest('created_at')
            ->first();
        $pemakaiansebelumnya = $pemakaian->akhir ?? 0;

        if ($request->akhir <= $pemakaiansebelumnya) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Data pemakaian akhir tidak valid.');
        }

        $meteran = Meteran::with('layanan')->where('nomor_meteran', $nomor_meteran)->first();

        $id_pakai = "TRX" . $replace_bln . $nomor_meteran;
        $validatedData['id_pakai'] = $id_pakai;
        $validatedData['nomor_meteran'] = $nomor_meteran;
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

        return redirect()->route('pemakaian.show', $id_pakai)
            ->with('success', 'Pemakaian berhasil diinput');
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
            'nomor_meteran' => 'required|integer',
            'bulan' => 'required|string',
            // 'tahun' => 'required|string|max:4',
            'akhir' => 'required|integer',
        ]);

        $carbon = Carbon::createFromFormat('Y-m', $request->get('bulan'));

        $validatedData['bulan'] = $carbon->format('n');
        $validatedData['tahun'] = $carbon->format('Y');

        $validatedData['updated_by'] = Auth::id();
        $validatedData['pakai'] = (intval($pemakaian->akhir) - intval($pemakaian->awal));

        try {
            $pemakaian->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
