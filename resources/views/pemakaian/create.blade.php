<x-layout.app title="Tambah Pemakaian" activeMenu="pemakaian.create" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Tambah Pemakaian" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pemakaian', 'url' => route('pemakaian.index')],
            ['label' => 'Tambah Pemakaian'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('pemakaian.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('pemakaian.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('pemakaian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>

