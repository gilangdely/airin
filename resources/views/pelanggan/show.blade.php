<x-layout.app title="Detail Pelanggan" activeMenu="pelanggan.show" :withError="true">
     <div class="container my-5">
        <x-breadcrumb title="Detail Pelanggan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pelanggan', 'url' => route('pelanggan.index')],
            ['label' => 'Detail Pelanggan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('pelanggan view')
                        <a href="{{ route('pelanggan.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('pelanggan edit')
                        <a href="{{ route('pelanggan.edit', $pelanggan) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('pelanggan delete')
                            <form action="{{ route('pelanggan.destroy', $pelanggan) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data pelanggan ini akan dihapus!"
                                    positive="Ya, hapus!" icon="info"
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="tooltip"
                                    data-bs-title="Hapus"
                                    data-bs-placement="top">
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
                                    <label for="first-name-horizontal">Nama Pelanggan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pelanggan->nama_pelanggan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Ktp</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pelanggan->no_ktp }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Alamat</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pelanggan->alamat }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Hp</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pelanggan->no_hp }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pelanggan->status }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
