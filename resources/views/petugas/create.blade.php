<x-layout.app title="Tambah Petugas" activeMenu="petugas.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Tambah Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Petugas', 'url' => route('petugas.index')],
            ['label' => 'Tambah Petugas'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-ui.error-list />

                <form action="{{ route('petugas.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('petugas.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>