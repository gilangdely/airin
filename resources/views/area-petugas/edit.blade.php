<x-layout.app title="Perbarui Area Petugas" activeMenu="area-petugas.edit" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Area Petugas" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Area Petugas', 'url' => route('area-petugas.index')],
            ['label' => 'Perbarui Area Petugas'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('area-petugas.update', $areaPetugas) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('area-petugas.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('area-petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>