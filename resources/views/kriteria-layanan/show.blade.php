<x-layout.app title="Detail Kriteria Layanan" activeMenu="kriteria-layanan.show" :withError="true">
     <div class="container my-5">
        <x-breadcrumb title="Detail Kriteria Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Kriteria Layanan', 'url' => route('kriteria-layanan.index')],
            ['label' => 'Detail Kriteria Layanan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('kriteria-layanan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('kriteria-layanan view')
                        <a href="{{ route('kriteria-layanan.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('kriteria-layanan edit')
                        <a href="{{ route('kriteria-layanan.edit', $kriteriaLayanan) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('kriteria-layanan delete')
                            <form action="{{ route('kriteria-layanan.destroy', $kriteriaLayanan) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data kriteria layanan ini akan dihapus!"
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
                                    <label for="first-name-horizontal">Id Layanan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $kriteriaLayanan->id_layanan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kriteria</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $kriteriaLayanan->kriteria }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status Aktif</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $kriteriaLayanan->status_aktif }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
