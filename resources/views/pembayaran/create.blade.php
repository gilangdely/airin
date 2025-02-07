<x-layout.app title="Pembayaran Tagihan" activeMenu="pembayaran.create" :withError="false">
    <div class="container my-5">
        <x-breadcrumb title="Pembayaran Tagihan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pembayaran', 'url' => route('pembayaran.index')],
            ['label' => 'Pembayaran Tagihan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('pembayaran.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-4">
                            @include('pembayaran.includes.form')
                        </div>
                        <div class="col-md-8">
                            <span>Rincian Pembayaran</span>
                            <table class="table table-hover table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Tarif/m3</th>
                                        <th>Pemakaian</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailtagihan as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->pemakaian->tblbulan->nama_bulan }}</td>
                                            <td>{{ 'Rp ' . number_format($row->tarif, 0, ',', '.') }}</td>
                                            <td>{{ $row->pakai . ' m3' }}</td>
                                            <td>{{ 'Rp ' . number_format($row->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" style="text-align: right;">Total</td>
                                        <td>{{ $detailtagihan->sum('pakai') . ' m3' }}</td>
                                        <td>{{ 'Rp ' . number_format($detailtagihan->sum('subtotal'), 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Bayar</button>
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
