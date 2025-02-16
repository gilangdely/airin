<x-layout.app title="Detail Pembayaran" activeMenu="pembayaran.show" :withError="true">
    <div class="container my-5">
        <x-breadcrumb title="Detail Pembayaran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pembayaran', 'url' => route('pembayaran.index')],
            ['label' => 'Detail Pembayaran'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @if ($pembayaran->tagihan->status_tagihan == 1 && $pembayaran->tagihan->status_pembayaran == 0)
                            @can('pembayaran edit')
                                <a href="{{ route('pembayaran.edit', $pembayaran) }}" class="btn btn-sm btn-primary">
                                    <i class="bx bx-pencil me-1"></i>Edit
                                </a>
                            @endcan
                            @can('pembayaran delete')
                                <form action="{{ route('pembayaran.destroy', $pembayaran) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <x-input.confirm-button text="Data pembayaran ini akan dihapus!" positive="Ya, hapus!"
                                        icon="info" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus" data-bs-placement="top">
                                        <i class="bx bx-trash me-1"></i>Hapus
                                    </x-input.confirm-button>
                                </form>
                            @endcan
                        @else
                        <form action="{{ route('pembayaran.pembatalan', $pembayaran) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <x-input.confirm-button text="Pembayaran dibatalkan?" positive="Ya, Batalkan!"
                                icon="info" class="btn btn-outline-danger btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Batalkan!" data-bs-placement="top">
                                <span class="bx bx-x"></span>
                                Pembatalan Pembayaran
                            </x-input.confirm-button>
                        </form>
                        <a href="{{ route('pembayaran.cetakkuitansi', $pembayaran) }}" class="btn btn-sm btn-primary">
                            <i class='bx bx-printer' ></i> Cetak Kuitansi
                        </a>
                        @endif
                    </div>
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
                                @foreach ($detailpembayaran as $row)
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
                                    <td>{{ $detailpembayaran->sum('pakai') . ' m3' }}</td>
                                    <td>{{ 'Rp ' . number_format($detailpembayaran->sum('subtotal'), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
