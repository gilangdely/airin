<x-layout.app title="Detail Petugas" activeMenu="petugas.show" :withError="true">
     <div class="container my-5">
        <x-ui.breadcrumb title="Detail Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Petugas', 'url' => route('petugas.index')],
            ['label' => 'Detail Petugas'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('petugas.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('petugas view')
                        <a href="{{ route('petugas.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('petugas edit')
                        <a href="{{ route('petugas.edit', $petugas) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('petugas delete')
                            <form action="{{ route('petugas.destroy', $petugas) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data petugas ini akan dihapus!"
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
                                    <label for="first-name-horizontal">Nama Lengkap</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $petugas->nama_lengkap }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nomor Induk Petugas</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $petugas->nomor_induk_petugas }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nomor Telepon</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $petugas->nomor_telepon }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Alamat</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $petugas->alamat }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
