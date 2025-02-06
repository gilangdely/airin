<x-layout.app title="Perbarui Pelanggan" activeMenu="pelanggan.edit" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Pelanggan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pelanggan', 'url' => route('pelanggan.index')],
            ['label' => 'Perbarui Pelanggan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('pelanggan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>