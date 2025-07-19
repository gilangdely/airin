<x-layout.app title="Perbarui Petugas" activeMenu="petugas.edit" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Perbarui Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Petugas', 'url' => route('petugas.index')],
            ['label' => 'Perbarui Petugas'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('petugas.update', $petugas) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('petugas.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>