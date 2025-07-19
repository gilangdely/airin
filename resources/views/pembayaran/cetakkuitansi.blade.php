<x-layout.app title="Cetak Kuitansi" activeMenu="pembayaran.show" :withError="true">
    <div class="container my-5">
        <x-ui.breadcrumb title="Cetak Kuitansi" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pembayaran', 'url' => route('pembayaran.index')],
            ['label' => 'Cetak Kuitansi'],
        ]" />
        <div class="row">
            <div class="col-md-9" id="cetakkuitansi">
                <div class="card px-5 py-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/img/logo/template_logo.png') }}" alt="Logo Airin"
                                    style="width: 80px;">
                            </div>
                            <div class="col-md-10">
                                <div class="text-start">
                                    <h4>Airin - Bumdes Karang Nangka</h4>
                                    <p>Jalan Raya Karangnangka RT 001 RW 003 No 1, Kec. Kedungbanteng, Kab. Banyumas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body mt-5">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h5>BUKTI PEMBAYARAN</h5>
                                <p>Tanggal Pembayaran : {{ $pembayaran->waktu_pembayaran }}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <form class="row g-3">
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">No Bukti</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->id_pembayaran }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Id Tagihan</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->id_tagihan }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Nomor Meteran</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->meteran->nomor_meteran }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Bulan</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->bulan->nama_bulan }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Tahun</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->tahun }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Total Nominal</label>
                                    </div>
                                    <div class="col-md-8 form-group">:
                                        {{ 'Rp ' . number_format($pembayaran->total_nominal, 0, ',', '.') }}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Metode</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->metode_pembayaran }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Catatan</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->catatan }}</div>
                                    <div class="col-md-4">
                                        <label for="first-name-horizontal">Petugas</label>
                                    </div>
                                    <div class="col-md-8 form-group">: {{ $pembayaran->petugas }}</div>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <p>Dengan Sebagai Rincian Berikut : </p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bulan</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detailpembayaran as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->pemakaian->tblbulan->nama_bulan }}</td>
                                                <td>{{ 'Rp ' . number_format($row->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Total</td>
                                            <td>{{ 'Rp ' . number_format($detailpembayaran->sum('subtotal'), 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="mt-5">
                        </div>
                    </div>
                    <div class="card-footer">
                        <p>TERBILANG :
                            {{ strtoupper(App\Helpers\Terbilang::convert($pembayaran->total_nominal) . ' RUPIAH') }}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-3  offset-md-6">
                                <p>Petugas</p>
                                <br>
                                <br>
                                <br>
                                {{ auth()->user()->name }}
                            </div>
                            <div class="col-md-3 text-center">
                                <p>Penyetor</p>
                                <br>
                                <br>
                                <br>
                                {{ $pembayaran->meteran->pelanggan->nama_pelanggan }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card px-3 py-3 gap-3">
                    <button class="btn btn-danger" onclick="printKuitansi()">
                        <i class='bx bx-printer'></i> Print
                    </button>
                    <button class="btn btn-outline-info">
                        <i class='bx bx-download'></i> Download
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printKuitansi() {
            var printContents = document.getElementById("cetakkuitansi").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

</x-layout.app>
