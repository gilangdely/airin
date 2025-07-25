<x-layout.app title="Perbarui Kriteria Layanan" activeMenu="kriteria-layanan.edit" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Perbarui Kriteria Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Kriteria Layanan', 'url' => route('kriteria-layanan.index')],
            ['label' => 'Perbarui Kriteria Layanan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-ui.error-list />

                <form action="{{ route('kriteria-layanan.update', $kriteriaLayanan) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('kriteria-layanan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('layanan.show',$kriteriaLayanan->id_layanan) }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>