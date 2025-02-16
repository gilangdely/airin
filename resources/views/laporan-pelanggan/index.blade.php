<x-layout.app title="Laporan Per Meteran" activeMenu="laporan-pelanggan" :withError="true">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Laporan Per Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')], //
            ['label' => 'Laporan Per Meteran'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="row g-3 justify-content-between align-items-center">

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari meteran..."
                                value="{{ old('search') }}" hx-get="{{ route('laporan-pelanggan.index') }}"
                                hx-target="#tagihan-table" hx-indicator="#search-loading"
                                hx-trigger="click from:button, keyup[keyCode==13]" hx-push-url="true">

                            <button class="btn btn-outline-secondary" type="button">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-container">
                <div id="search-loading" class="htmx-indicator">
                    <div class="flex-row px-4 py-3 mx-auto mt-5 text-center card d-flex justify-content-center justify-items-center"
                        style="width: 200px;">
                        <div class="px-2 d-flex align-items-center">
                            <div class="loading-spinner"></div>
                        </div>
                        <span>Sedang mencari tagihan...</span>
                    </div>
                </div>

                <div id="tagihan-table">
                    @include('laporan-pelanggan.includes.index-table', compact('meteran'))
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
