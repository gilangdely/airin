<x-layout.app title="Cek Kartu Meteran" activeMenu="tagihan.show" :withError="true">
    <div class="container my-5">
        <x-breadcrumb title="Cek Kartu Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Cek Kartu Meteran'],
        ]" />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('tagihan.proseskartumeteran') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-12">

                            <div class="mb-4">
                                <label for="chip_kartu" class="form-label">Kartu Meteran</label>
                                <input type="text" name="chip_kartu"
                                    class="form-control {{ $errors->has('chip_kartu') ? 'is-invalid' : '' }}"
                                    id="chip_kartu" value="{{ old('chip_kartu') }}"
                                    placeholder="Masukkan Nomor Meteran" autofocus />
                                @error('chip_kartu')
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
