<x-layout.app title="Perbarui Layanan" activeMenu="layanan.edit" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Layanan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Layanan', 'url' => route('layanan.index')],
            ['label' => 'Perbarui Layanan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('layanan.update', $layanan) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('layanan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>