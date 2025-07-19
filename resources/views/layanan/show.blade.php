<x-layout.app title="Detail Layanan" activeMenu="layanan.show" :withError="true">
    <div class="container my-5">
        <x-ui.breadcrumb title="Detail Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Layanan', 'url' => route('layanan.index')],
            ['label' => 'Detail Layanan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('layanan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('layanan create')
                            <a href="{{ route('layanan.create') }}" class="btn btn-sm btn-info">
                                <i class="bx bx-plus me-1"></i>Baru
                            </a>
                        @endcan
                        @can('layanan edit')
                            <a href="{{ route('layanan.edit', $layanan) }}" class="btn btn-sm btn-primary">
                                <i class="bx bx-pencil me-1"></i>Edit
                            </a>
                        @endcan
                        @can('layanan delete')
                            <form action="{{ route('layanan.destroy', $layanan) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data layanan ini akan dihapus!" positive="Ya, hapus!"
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
                        <label for="first-name-horizontal">Nama Layanan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $layanan->nama_layanan }}</div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>Tarif Layanan</span>
                    <div class="d-flex gap-2">
                        <div>
                            @can('tarif-layanan create')
                                <a href="{{ route('tarif-layanan.create', ['id_layanan' => $layanan->id_layanan]) }}"
                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-title="Tambah"
                                    data-bs-placement="top">
                                    <i class="bx bx-plus me-1"></i>Baru
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-mg-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 25%">Tier</th>
                                    <th style="width: 15%">Min Pemakaian</th>
                                    <th style="width: 15%">Max Pemakaian</th>
                                    <th style="width: 22%">Tarif</th>
                                    @canany(['tarif-layanan edit', 'tarif-layanan delete'])
                                        <th>Aksi</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tariflayanan as $tarif)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tarif->tier }}</td>
                                        <td>{{ $tarif->min_pemakaian }}</td>
                                        <td>{{ $tarif->max_pemakaian }}</td>
                                        <td>{{ 'Rp ' . number_format($tarif->tarif, 0, ',', '.') }}</td>
                                        @canany(['tarif-layanan edit', 'tarif-layanan delete'])
                                            <td>
                                                @can('tarif-layanan edit')
                                                    <a href="{{ route('tarif-layanan.edit', $tarif->id_tarif_layanan) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bx-pencil me-1"></i>Edit
                                                    </a>
                                                @endcan
                                                @can('tarif-layanan delete')
                                                    <form
                                                        action="{{ route('tarif-layanan.destroy', $tarif->id_tarif_layanan) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf @method('DELETE')
                                                        <x-input.confirm-button text="Data tarif layanan ini akan dihapus!"
                                                            positive="Ya, hapus!" icon="info" class="btn btn-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-title="Hapus"
                                                            data-bs-placement="top">
                                                            <i class="bx bx-trash me-1"></i>Hapus
                                                        </x-input.confirm-button>
                                                    </form>
                                                @endcan
                                            </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>Kriteria Layanan</span>
                    <div class="d-flex gap-2">
                        <div>
                            @can('kriteria-layanan create')
                                <a href="{{ route('kriteria-layanan.create', ['id_layanan' => $layanan->id_layanan]) }}"
                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-title="Tambah"
                                    data-bs-placement="top">
                                    <i class="bx bx-plus me-1"></i>Baru
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-mg-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 65%">Kriteria</th>
                                    @canany(['kriteria-layanan edit', 'kriteria-layanan delete'])
                                        <th>Aksi</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterialayanan as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kriteria }}</td>
                                        @canany(['kriteria-layanan edit', 'kriteria-layanan delete'])
                                            <td>
                                                @can('kriteria-layanan edit')
                                                    <a href="{{ route('kriteria-layanan.edit', $row->id_kriteria_layanan) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bx bx-pencil me-1"></i>Edit
                                                    </a>
                                                @endcan
                                                @can('kriteria-layanan delete')
                                                    <form
                                                        action="{{ route('kriteria-layanan.destroy', $row->id_kriteria_layanan) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf @method('DELETE')
                                                        <x-input.confirm-button text="Data kriteria layanan ini akan dihapus!"
                                                            positive="Ya, hapus!" icon="info" class="btn btn-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-title="Hapus"
                                                            data-bs-placement="top">
                                                            <i class="bx bx-trash me-1"></i>Hapus
                                                        </x-input.confirm-button>
                                                    </form>
                                                @endcan
                                            </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
