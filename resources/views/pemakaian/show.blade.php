<x-layout.app title="Detail Pemakaian" activeMenu="pemakaian.show" :withError="true">
    <div class="container my-5">
        <x-ui.breadcrumb title="Detail Pemakaian" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pemakaian', 'url' => route('pemakaian.index')],
            ['label' => 'Detail Pemakaian'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pemakaian.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        @can('tagihan generatetagihan')
                            @if ($pemakaian->status_pembayaran < 1)
                                <a href="{{ route('tagihan.create', $pemakaian->nomor_meteran) }}"
                                    class="btn btn-sm btn-success">
                                    <i class='bx bx-receipt me-1'></i> Generate Tagihan
                                </a>
                            @endif
                        @endcan

                        @can('pemakaian edit')
                            <a href="{{ route('pemakaian.edit', $pemakaian) }}" class="btn btn-sm btn-primary">
                                <i class="bx bx-pencil me-1"></i>Edit
                            </a>
                        @endcan
                        @can('pemakaian delete')
                            <form action="{{ route('pemakaian.destroy', $pemakaian) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <x-input.confirm-button text="Data pemakaian ini akan dihapus!" positive="Ya, hapus!"
                                    icon="info" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                    data-bs-title="Hapus" data-bs-placement="top">
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
                        <label for="first-name-horizontal">Nomor Meteran</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->meteran->nomor_meteran }}</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Layanan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->deskripsi }}</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Bulan</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->tblbulan->nama_bulan }}</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Tahun</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->tahun }}</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Meteran Awal</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->awal }} m3</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Meteran Akhir</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->akhir }} m3</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Terpakai</label>
                    </div>
                    <div class="col-md-8 form-group">: {{ $pemakaian->pakai }} m3</div>

                    <div class="col-md-4">
                        <label for="first-name-horizontal">Status Pembayaran</label>
                    </div>
                    <div class="col-md-8 form-group">:
                        @if ($pemakaian?->status_pembayaran == 1)
                            <span class="badge bg-label-success">Lunas</span>
                        @else
                            <span class="badge bg-label-danger">Belum Dibayar</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
