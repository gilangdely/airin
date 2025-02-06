<x-layout.app title="Detail Tagihan" activeMenu="tagihan.show" :withError="true">
     <div class="container my-5">
        <x-breadcrumb title="Detail Tagihan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Detail Tagihan'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tagihan.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('tagihan view')
                        <a href="{{ route('tagihan.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        @endcan
                        @can('tagihan edit')
                        <a href="{{ route('tagihan.edit', $tagihan) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        @endcan
                        @can('tagihan delete')
                            <form action="{{ route('tagihan.destroy', $tagihan) }}"
                                method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data tagihan ini akan dihapus!"
                                    positive="Ya, hapus!" icon="info"
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="tooltip"
                                    data-bs-title="Hapus"
                                    data-bs-placement="top">
                                    <i class="bx bx-trash me-1"></i>Hapus
                                </x-input.confirm-button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Id Bulan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->id_bulan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tahun</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->tahun }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Id Pelanggan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->id_pelanggan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nominal</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->nominal }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Waktu Awal</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->waktu_awal }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Waktu Akhir</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->waktu_akhir }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status Tagihan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->status_tagihan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status Pembayaran</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $tagihan->status_pembayaran }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
