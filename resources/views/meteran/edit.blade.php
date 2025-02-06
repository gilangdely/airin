<x-layout.app title="Perbarui Meteran" activeMenu="meteran.edit" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Meteran', 'url' => route('meteran.index')],
            ['label' => 'Perbarui Meteran'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('meteran.update', $meteran) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('meteran.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('meteran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>