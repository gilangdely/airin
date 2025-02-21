<x-layout.app title="Detail Meteran" activeMenu="meteran.show" :withError="true">
    <div class="container my-5">
        <x-breadcrumb title="Detail Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Meteran', 'url' => route('meteran.index')],
            ['label' => 'Detail Meteran'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('meteran.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        <a href="{{ route('meteran.cetakkartu',$meteran) }}" class="btn btn-sm btn-success">
                            <i class='bx bx-credit-card me-1'></i> Buat Kartu
                        </a>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalMapping">
                            <i class='bx bx-credit-card me-1'></i> Mapping
                        </button>
                        @can('meteran view')
                            <a href="{{ route('meteran.create') }}" class="btn btn-sm btn-info">
                                <i class="bx bx-plus me-1"></i>Baru
                            </a>
                        @endcan
                        @can('meteran edit')
                            <a href="{{ route('meteran.edit', $meteran) }}" class="btn btn-sm btn-primary">
                                <i class="bx bx-pencil me-1"></i>Edit
                            </a>
                        @endcan
                        @can('meteran delete')
                            <form action="{{ route('meteran.destroy', $meteran) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data meteran ini akan dihapus!" positive="Ya, hapus!"
                                    icon="info" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                    data-bs-title="Hapus" data-bs-placement="top">
                                    <i class="bx bx-trash me-1"></i>Hapus
                                </x-input.confirm-button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Pelanggan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->pelanggan->nama_pelanggan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->nomor_meteran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Layanan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->layanan->nama_layanan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Lokasi Pemasangan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->lokasi_pemasangan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Tanggal Pemasangan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ date('d-M-Y',strtotime($meteran->tanggal_pemasangan)) }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Status</label>
                    </div>
                    <div class="col-md-8 form-group">:
                        @if ($meteran?->status == 1)
                            <span class="badge bg-label-success">Aktif</span>
                        @else
                            <span class="badge bg-label-danger">Tidak Aktif</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Chip Kartu</label>
                    </div>
                    <div class="col-md-8 form-group">:
                        @isset($meteran->chip_kartu)
                            {{ $meteran->chip_kartu }}</div>
                    @else
                        <span class="badge bg-label-danger">Belum Terdaftar</span>
                    @endisset
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalMapping" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalMappingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('meteran.mapping') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalMappingLabel">Mapping Kartu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="nomor_meteran" value="{{ $meteran->nomor_meteran }}">
                            <label for="chip_kartu" class="form-label">Chip</label>
                            <input type="text" name="chip_kartu" class="form-control" id="chip_kartu"
                                value="{{ $meteran?->chip_kartu }}" placeholder="Tap kartu ke RFID Reader" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary me-2"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Mapping</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout.app>

@push('script')
    <script></script>
@endpush
