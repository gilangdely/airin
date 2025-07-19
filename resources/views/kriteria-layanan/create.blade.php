<x-layout.app title="Tambah Kriteria Layanan" activeMenu="kriteria-layanan.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Tambah Kriteria Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Kriteria Layanan', 'url' => route('kriteria-layanan.index')],
            ['label' => 'Tambah Kriteria Layanan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('kriteria-layanan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('kriteria-layanan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('layanan.show',$id_layanan) }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>