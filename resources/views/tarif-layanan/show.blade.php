<x-layout.app title="Detail Tarif Layanan" activeMenu="tarif-layanan.show" :withError="true">
     <div class="container my-5">
        <x-ui.breadcrumb title="Detail Tarif Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tarif Layanan', 'url' => route('tarif-layanan.index')],
            ['label' => 'Detail Tarif Layanan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tarif-layanan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('tarif-layanan view')
                        <a href="{{ route('tarif-layanan.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('tarif-layanan edit')
                        <a href="{{ route('tarif-layanan.edit', $tarifLayanan) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('tarif-layanan delete')
                            <form action="{{ route('tarif-layanan.destroy', $tarifLayanan) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data tarif layanan ini akan dihapus!"
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
                                <div class="col-md-8 form-group">: {{ $tarifLayanan->id_layanan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tier</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tarifLayanan->tier }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Min Pemakaian</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tarifLayanan->min_pemakaian }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Max Pemakaian</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tarifLayanan->max_pemakaian }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tarif</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tarifLayanan->tarif }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
