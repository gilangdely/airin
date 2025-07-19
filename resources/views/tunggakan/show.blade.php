<x-layout.app title="Detail Tunggakan" activeMenu="tunggakan.show" :withError="true">
    <div class="container my-5">
        <x-ui.breadcrumb title="Detail Tunggakan" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Detail Tunggakan']]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        {{-- @if ($pembayaran->tagihan->status_tagihan == 1 && $pembayaran->tagihan->status_pembayaran == 0)
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
                        @else --}}
                        {{-- <form action="{{ route('pembayaran.pembatalan', $pembayaran) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <x-input.confirm-button text="Pembayaran dibatalkan?" positive="Ya, Batalkan!"
                                icon="info" class="btn btn-outline-danger btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Batalkan!" data-bs-placement="top">
                                <span class="bx bx-x"></span>
                                Pembatalan Pembayaran
                            </x-input.confirm-button>
                        </form> --}}
                        {{-- <a href="{{ route('pembayaran.cetakkuitansi', $pembayaran) }}" class="btn btn-sm btn-primary">
                            <i class='bx bx-printer' ></i> Cetak Kuitansi
                        </a> --}}
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nama Pelanggan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tunggakan->nama_pelanggan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tunggakan->nomor_meteran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Jumlah Bulan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tunggakan->jumlah_bulan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Total Pakai</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $tunggakan->total_pakai }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Status Bayar</label>
                    </div>
                    <div class="col-md-8 form-group">: <span class="badge bg-label-danger">Belum Bayar </span></div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>Rincian Tunggakan</span>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="align-middle">Nomor Meteran</th>
                                <th class="align-middle">Bulan</th>
                                <th class="align-middle">Tahun</th>
                                <th class="align-middle">Awal</th>
                                <th class="align-middle">Akhir</th>
                                <th class="align-middle">Pakai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailTunggakan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row?->meteran->nomor_meteran }}</td>
                                    <td>{{ $row?->tblbulan->nama_bulan }}</td>
                                    <td>{{ $row?->tahun }}</td>
                                    <td>{{ $row?->awal }}</td>
                                    <td>{{ $row?->akhir }}</td>
                                    <td>{{ $row?->pakai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-layout.app>
