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
                        <label for="first-name-horizontal">Id Pelanggan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->id_pelanggan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->nomor_meteran }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Id Layanan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->layanan->nama_layanan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Lokasi Pemasangan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->lokasi_pemasangan }}</div>
                    <div class="col-md-4">
                        <label for="first-name-horizontal">Tanggal Pemasangan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $meteran->tanggal_pemasangan }}</div>
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
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
