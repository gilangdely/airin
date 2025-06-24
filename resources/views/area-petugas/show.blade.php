<x-layout.app title="Detail Area Petugas" activeMenu="area-petugas.show" :withError="true">
     <div class="container my-5">
        <x-breadcrumb title="Detail Area Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Area Petugas', 'url' => route('area-petugas.index')],
            ['label' => 'Detail Area Petugas'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('area-petugas.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('area-petugas view')
                        <a href="{{ route('area-petugas.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('area-petugas edit')
                        <a href="{{ route('area-petugas.edit', $areaPetugas) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('area-petugas delete')
                            <form action="{{ route('area-petugas.destroy', $areaPetugas) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data area petugas ini akan dihapus!"
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
                                    <label for="first-name-horizontal">Nama Area</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $areaPetugas->nama_area }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Id Petugas</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $areaPetugas->id_petugas }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Keterangan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $areaPetugas->keterangan }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
