<x-layout.app title="Pembayaran" activeMenu="laporan-pembayaran">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('Laporan Pembayaran') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Below is a list of all laporan pembayaran.') }}
                        </p>
                    </div>
                    <x-breadcrumb>
                        <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Laporan Pembayaran') }}</li>
                    </x-breadcrumb>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @grid([
                                        'dataProvider' => $dataProvider,
                                        'rowsPerPage' => $perPage,
                                        'columnOption' => [
                                            'class' => 'attribute',
                                            'formatters' => ['text', 'raw'],
                                        ],
                                        'columns' => [
                                            [
                                                'class' => 'raw',
                                                'title' => 'NO',
                                                'value' => function () use (&$i) {
                                                    return ++$i . '.';
                                                },
                                            ],
                                            [
                                                'title' => 'NO. METERAN',
                                                'value' => 'nomor_meteran',
                                            ],
                                            [
                                                'title' => 'NAMA PELANGGAN',
                                                'value' => 'nama_pelanggan',
                                            ],
                                            [
                                                'title' => 'LAYANAN',
                                                'value' => 'nama_layanan',
                                            ],
                                            [
                                                'title' => 'TANGGAL PEMBAYARAN',
                                                'value' => 'waktu_pembayaran',
                                            ],
                                            [
                                                'title' => 'METODE PEMBAYARAN',
                                                'value' => 'metode_pembayaran',
                                            ],
                                            [
                                                'title' => 'TOTAL',
                                                'class' => 'raw',
                                                'formatters' => ['raw'],
                                                'value' => function ($row) {
                                                    return 'Rp. ' . number_format($row->total_nominal, 0, ',', '.');
                                                },
                                            ],
                                            [
                                                'title' => 'AKSI',
                                                'class' => 'callback',
                                                'formatters' => ['raw'],
                                                'value' => function ($row) {
                                                    $viewUrl = route("laporan-pembayaran.show", $row);
                                                    return '
                                                <div class="btn-group" role="group">
                                                    ' . (auth()->user()->can('pembayaran view') ? '
                                                    <div class="me-1">
                                                        <a href="' . $viewUrl . '"
                                                            class="btn btn-icon btn-outline-info btn-sm"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-title="Detail"
                                                            data-bs-placement="top">
                                                            <span class="bx bx-show"></span>
                                                        </a>
                                                    </div>
                                                    ' : '') . '
                                                </div>
                                            ';
                                                }
                                            ]

                                        ],
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout.app>