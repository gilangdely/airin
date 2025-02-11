<x-layout.app title="Pembayaran" activeMenu="laporan-pembayaran">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('Laporan Pambayaran') }}</h3>
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
                                        // 'tableOptions' => [
                                        //     'class' => 'table table-striped table-bordered table-hover',
                                        // ],
                                        'columns' => [
                                            [
                                                'class' => 'raw',
                                                'title' => 'No',
                                                // 'headerOptions' => ['style' => 'width: 60px;', 'class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                                'value' => function () use (&$i) {
                                                    return ++$i . '.';
                                                },
                                            ],
                                            [
                                                'title' => 'NAMA PELANGGAN',
                                                'value' => 'tagihan.pelanggan.nama_pelanggan',
                                                'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-left'],
                                                // 'filter' => true,
                                            ],
                                            [
                                                'title' => 'NO. METERAN',
                                                'value' => 'meteran.nomor_meteran',
                                                'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                                // 'filter' => true,
                                            ],
                                            [
                                                'class' => 'callback',
                                                'title' => 'PERIODE',
                                                'value' => function ($model) {
                                                    return $model->tagihan->bulan->nama_bulan . ' ' . $model->tagihan->tahun;
                                                },
                                                'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                            ],
                                            [
                                                'class' => 'callback',
                                                'title' => 'NOMINAL',
                                                'value' => function ($model) {
                                                    return 'Rp ' . number_format($model->tagihan->nominal, 0, ',', '.');
                                                },
                                                'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-right'],
                                            ],
                                            // [
                                            //     'class' => 'callback',
                                            //     'title' => 'PERIODE PEMBAYARAN',
                                            //     'value' => function ($model) {
                                            //         return date('d/m/Y', strtotime($model->tagihan->waktu_awal)) . ' - ' . date('d/m/Y', strtotime($model->tagihan->waktu_akhir));
                                            //     },
                                            //     'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                            // ],
                                            [
                                                'class' => 'callback',
                                                'title' => 'STATUS',
                                                'value' => function ($model) {
                                                    $status = $model->tagihan->status_pembayaran ? '<span class="badge bg-success">Lunas</span>' : '<span class="badge bg-danger">Belum Lunas</span>';
                                                    return $status;
                                                },
                                                'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                            ],
                                            // [
                                            //     'class' => 'callback',
                                            //     'title' => 'LAST UPDATE',
                                            //     'value' => function ($model) {
                                            //         return date('d-m-Y H:i:s', strtotime($model->tagihan->updated_at));
                                            //     },
                                            //     'format' => 'raw',
                                                // 'headerOptions' => ['class' => 'text-center'],
                                                // 'contentOptions' => ['class' => 'text-center'],
                                            //],
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