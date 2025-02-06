<x-layout.app title="Tambah Tagihan" activeMenu="tagihan.create" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Tambah Tagihan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Tambah Tagihan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('tagihan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('tagihan.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>