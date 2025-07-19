<x-layout.app title="Cek Meteran" activeMenu="pemakaian.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Cek Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pemakaian', 'url' => route('pemakaian.index')],
            ['label' => 'Cek Meteran'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-ui.error-list />

                <section class="mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nomor_meteran-tab" data-bs-toggle="tab"
                                data-bs-target="#nomor_meteran" type="button" role="tab"
                                aria-controls="nomor_meteran" aria-selected="true">
                                Cek Nomor Meteran
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chip_kartu-tab" data-bs-toggle="tab"
                                data-bs-target="#chip_kartu" type="button" role="tab" aria-controls="chip_kartu"
                                aria-selected="false">
                                Cek Chip Kartu
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane show  active" id="nomor_meteran" role="tabpanel"
                            aria-labelledby="nomor_meteran-tab">
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
                                                placeholder="Masukkan Nomor Meteran" autofocus/>
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
                        <div class="tab-pane" id="chip_kartu" role="tabpanel" aria-labelledby="chip_kartu-tab">
                            <form action="{{ route('pemakaian.storecekchipkartu') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="mb-4">
                                            <label for="chip_kartu" class="form-label">Chip Kartu</label>
                                            <input type="text" name="chip_kartu"
                                                class="form-control {{ $errors->has('chip_kartu') ? 'is-invalid' : '' }}"
                                                id="chip_kartu" value="{{ old('chip_kartu') }}"
                                                placeholder="Tap kartu Meteran"/>
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

                </section>


            </div>
        </div>
    </div>
</x-layout.app>
