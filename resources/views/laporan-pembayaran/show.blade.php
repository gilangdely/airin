<x-layout.app title="Laporan Pembayaran" activeMenu="laporan-pembayaran.show" :withError="true">
    <div class="container my-5">
        <x-breadcrumb title="Detail Pembayaran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pembayaran', 'url' => route('laporan-pembayaran.index')],
            ['label' => 'Laporan Pembayaran'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('laporan-pembayaran.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Id Tagihan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pembayaran->id_tagihan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pembayaran->meteran->nomor_meteran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Layanan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pembayaran->meteran->layanan->nama_layanan }}</div>
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
                    <div class="col-md-8 form-group">: {{ 'Rp ' . number_format($pembayaran->total_nominal, 0, ',', '.') }}
                    </div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Waktu Pembayaran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pembayaran->waktu_pembayaran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Metode Pembayaran</label>
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
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>Rincian Pembayaran</span>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <th>Tarif/m3</th>
                                    <th>Pemakaian</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailPembayaran as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->pemakaian->tblbulan->nama_bulan }}</td>
                                        <td>{{ 'Rp ' . number_format($row->tarif, 0, ',', '.') }}</td>
                                        <td>{{ $row->pakai . ' m3' }}</td>
                                        <td>{{ 'Rp ' . number_format($row->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" style="text-align: right;">Total</td>
                                    <td>{{ $detailPembayaran->sum('pakai') . ' m3' }}</td>
                                    <td>{{ 'Rp ' . number_format($detailPembayaran->sum('subtotal'), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
