<x-layout.app title="Tambah Area Petugas" activeMenu="area-petugas.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Tambah Area Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Area Petugas', 'url' => route('area-petugas.index')],
            ['label' => 'Tambah Area Petugas'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('area-petugas.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('area-petugas.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('area-petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>