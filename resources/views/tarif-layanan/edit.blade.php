<x-layout.app title="Perbarui Tarif Layanan" activeMenu="tarif-layanan.edit" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Perbarui Tarif Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tarif Layanan', 'url' => route('tarif-layanan.index')],
            ['label' => 'Perbarui Tarif Layanan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-ui.error-list />

                <form action="{{ route('tarif-layanan.update', $tarifLayanan) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('tarif-layanan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('layanan.show', ['id_layanan' => $tarifLayanan->id_layanan]) }}"
                            class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
