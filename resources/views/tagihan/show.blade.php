<x-layout.app title="Detail Tagihan" activeMenu="tagihan.show" :withError="true">
    <div class="container my-5">
        <x-ui.breadcrumb title="Detail Tagihan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Detail Tagihan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tagihan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @if ($tagihan->status_tagihan == 1 && $tagihan->status_pembayaran == 0)
                            <a href="{{ route('pembayaran.create', $tagihan->id_tagihan) }}"
                                class="btn btn-sm btn-success">
                                <i class='bx bx-money-withdraw'></i>Bayar
                            </a>
                            @can('tagihan edit')
                                <a href="{{ route('tagihan.edit', $tagihan) }}" class="btn btn-sm btn-primary">
                                    <i class="bx bx-pencil me-1"></i>Edit
                                </a>
                            @endcan
                            @can('tagihan delete')
                                <form action="{{ route('tagihan.destroy', $tagihan) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <x-input.confirm-button text="Data tagihan ini akan dihapus!" positive="Ya, hapus!"
                                        icon="info" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus" data-bs-placement="top">
                                        <i class="bx bx-trash me-1"></i>Hapus
                                    </x-input.confirm-button>
                                </form>
                            @endcan
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Bulan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->bulan->nama_bulan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Tahun</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->tahun }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Pelanggan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->pelanggan->nama_pelanggan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nominal</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ 'Rp ' . number_format($tagihan->nominal, 0, ',', '.') }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->meteran->nomor_meteran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Waktu Awal</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->waktu_awal }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Waktu Akhir</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tagihan->waktu_akhir }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Status Tagihan</label>
                    </div>
                    <div class="col-md-8 form-group">:
                        @if ($tagihan?->status_tagihan == 1)
                            <span class="badge bg-label-success">Aktif</span>
                        @else
                            <span class="badge bg-label-danger">Tidak Aktif</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Status Pembayaran</label>
                    </div>
                    <div class="col-md-8 form-group">:
                        @if ($tagihan?->status_pembayaran == 1)
                            <span class="badge bg-label-success">Lunas</span>
                        @else
                            <span class="badge bg-label-danger">Belum Dibayar</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>Rincian Tagihan</span>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-mg-12">
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
                                @foreach ($detailtagihan as $row)
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
                                    <td>{{ $detailtagihan->sum('pakai') . ' m3' }}</td>
                                    <td>{{ 'Rp ' . number_format($detailtagihan->sum('subtotal'), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
