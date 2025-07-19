<x-layout.app title="Tambah Pemakaian" activeMenu="pemakaian.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Tambah Pemakaian" :breadcrumbs="[
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

    @push('script')
        <script>
            // Ambil tanggal sekarang
            let today = new Date();
            let year = today.getFullYear();
            let month = today.getMonth() + 1; // getMonth() dimulai dari 0 (Januari = 0)

            // Format YYYY-MM
            let maxMonth = `${year}-${month.toString().padStart(2, '0')}`;

            // Set atribut max pada input
            document.getElementById("bulan").setAttribute("max", maxMonth);
        </script>
    @endpush
</x-layout.app>
