<x-layout.app title="Cek Meteran" activeMenu="pemakaian.create" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Cek Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pemakaian', 'url' => route('pemakaian.index')],
            ['label' => 'Cek Meteran'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('pemakaian.storecekmeteran') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-12">

                            <div class="mb-4">
                                <label for="nomor_meteran" class="form-label">Nomor Meteran</label>
                                <input type="text" name="nomor_meteran"
                                    class="form-control {{ $errors->has('nomor_meteran') ? 'is-invalid' : '' }}"
                                    id="nomor_meteran" value="{{ old('nomor_meteran') }}"
                                    placeholder="Masukkan Nomor Meteran" />
                                @error('nomor_meteran')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Lanjut</button>
                        <a href="{{ route('pemakaian.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-layout.app>
