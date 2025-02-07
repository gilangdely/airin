<x-layout.app title="Perbarui Pembayaran" activeMenu="pembayaran.edit" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Pembayaran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pembayaran', 'url' => route('pembayaran.index')],
            ['label' => 'Perbarui Pembayaran'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('pembayaran.update', $pembayaran) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('pembayaran.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>