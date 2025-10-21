<x-layout.app title="Dashboard" activeMenu="dashboard" :withError="true">
    <div class="container my-5">
        <div class="card">
            <div class="card-header h4">{{ __('Dashboard') }}</div>

            @role(['Admin', 'Kasir'])
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                        <!-- Kartu Statistik -->
                        @php
                            $data = [
                                [
                                    'icon' => 'bi-people-fill',
                                    'bg' => 'primary',
                                    'value' => $pelanggan,
                                    'label' => 'Total pelanggan',
                                    'route' => route('pelanggan.index'),
                                ],
                                [
                                    'icon' => 'bi-speedometer',
                                    'bg' => 'warning',
                                    'value' => $meteran,
                                    'label' => 'Total meteran aktif',
                                    'route' => route('meteran.index'),
                                ],
                                [
                                    'icon' => 'bi-receipt',
                                    'bg' => 'danger',
                                    'value' => $totaltagihan,
                                    'label' => 'Total tagihan bulan ini',
                                    'route' => route('tagihan.index'),
                                ],
                                [
                                    'icon' => 'bi-exclamation-circle',
                                    'bg' => 'warning',
                                    'value' => $tagihanBelumLunas,
                                    'label' => 'Tagihan belum lunas',
                                    'route' => route('tagihan.index'),
                                ],
                                [
                                    'icon' => 'bi-cash-stack',
                                    'bg' => 'success',
                                    'value' => 'Rp ' . number_format($totalNominal, 0, ',', '.'),
                                    'label' => 'Total pembayaran bulan ini',
                                    'change' => $persentasePerubahan, // Tambahkan perubahan persentase
                                    'route' => route('pembayaran.index'),
                                ],
                            ];
                        @endphp


                        @foreach ($data as $item)
                            <div class="col">
                                <a href="{{ $item['route'] }}" class="text-decoration-none text-dark">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div class="d-flex align-items-center mb-2 gap-3">
                                                <div class="rounded-1 bg-{{ $item['bg'] }} d-flex align-items-center justify-content-center"
                                                    style="width: 48px; height: 48px;">
                                                    <i class="bi {{ $item['icon'] }} text-white fs-5"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold fs-6 text-wrap">{{ $item['value'] }}</div>
                                                    @if (isset($item['change']))
                                                        @php
                                                            $change = $item['change'];
                                                        @endphp
                                                        <small
                                                            class="{{ $change > 0 ? 'text-success' : ($change < 0 ? 'text-danger' : 'text-muted') }}">
                                                            {!! $change > 0 ? '↑' : ($change < 0 ? '↓' : '') !!}
                                                            {{ number_format(abs($change), 2) }}%
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="card-text text-start mb-0 text-muted small">{{ $item['label'] }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    

                    <div class="card mt-5">
                        <div class="card-header header-elements p-4 my-n1">
                            {{-- Dropdown Tahun --}}
                            <div class="d-flex justify-content-between w-100 align-items-center">
                                <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2" id="chart-title">Total Pembayaran</h5>
                                <form id="filterTahunForm">
                                    <select name="tahun" class="form-select" hx-get="{{ route('dashboard.chart') }}"
                                        hx-target="#chartContainer" hx-trigger="change" hx-swap="innerHTML">
                                        @foreach ($tahunList as $tahun)
                                            <option value="{{ $tahun }}"
                                                {{ $tahun == $selectedYear ? 'selected' : '' }}>
                                                {{ $tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div id="chartContainer" class="card-body">
                            @include('dashboard.includes.chart', [
                                'selectedYear' => $selectedYear,
                                'grafikData' => $totalPembayaranPerBulan,
                                'bulanLabels' => $bulanLabels,
                            ])
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header header-elements p-4 my-n1">
                            <div class="d-flex justify-content-between w-100 align-items-center">
                                <h5 class="card-title mb-0">Perbandingan Tagihan vs Pembayaran</h5>
                                <form>
                                    <select name="tahun" class="form-select"
                                        hx-get="{{ route('dashboard.chart-perbandingan') }}"
                                        hx-target="#chartContainerPerbandingan" hx-trigger="change" hx-swap="innerHTML">
                                        @foreach ($tahunList as $tahun)
                                            <option value="{{ $tahun }}"
                                                {{ $tahun == $selectedYear ? 'selected' : '' }}>
                                                {{ $tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div id="chartContainerPerbandingan" class="card-body">
                            @include('dashboard.includes.chart-perbandingan', [
                                'selectedYear' => $selectedYear,
                                'dataTagihan' => $dataTagihan ?? [],
                                'dataPembayaran' => $dataPembayaran ?? [],
                                'bulanLabels' => $bulanLabels ?? [],
                            ])
                        </div>
                    </div>

                    <!-- Nav tabs -->
                    <section class="mt-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Daftar tunggakan
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    Pembayaran terbaru
                                </button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="table-responsive">
                                    <div class="row justify-content-between align-items-center g-2">
                                        <div class="col">
                                            <h5 class="card-header">Daftar tunggakan</h5>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('pemakaian.index') }}"
                                                class="btn btn-primary btn-sm float-end">
                                                Lihat pemakaian
                                            </a>
                                        </div>
                                    </div>
                                    <table class="table table-striped" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="align-middle">Nama Pelanggan</th>
                                                <th class="align-middle">Nomor Meteran</th>
                                                <th class="align-middle">Total Bulan</th>
                                                <th class="align-middle">Total Pemakaian</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pemakaian as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration + ($pemakaian->currentPage() - 1) * $pemakaian->perPage() }}
                                                    </td>
                                                    <td>{{ $row->nama_pelanggan }}</td>
                                                    <td>{{ $row->nomor_meteran }}</td>
                                                    <td>{{ $row->jumlah_bulan }}</td>
                                                    <td>{{ $row->total_pakai }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group">
                                                            @can('pemakaian view')
                                                                <div class="me-1">
                                                                    <a href="{{ route('tunggakan.show', $row->nomor_meteran) }}"
                                                                        class="btn btn-icon btn-outline-info btn-sm"
                                                                        data-bs-toggle="tooltip" data-bs-title="Detail"
                                                                        data-bs-placement="top">
                                                                        <span class="bx bx-show"></span>
                                                                    </a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada tunggakan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination --}}
                                <div class="mt-3 d-flex justify-content-end">
                                    {!! $pemakaian->withQueryString()->links() !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <div class="row justify-content-between align-items-center g-2">
                                        <div class="col">
                                            <h5 class="card-header">Daftar pembayaran terbaru</h5>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('pembayaran.index') }}"
                                                class="btn btn-primary btn-sm float-end">
                                                Lihat semua
                                            </a>
                                        </div>
                                    </div>
                                    <table class="table table-striped" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="align-middle">Nomor Meteran</th>
                                                <th class="align-middle">Nama Pelanggan</th>
                                                <th class="align-middle">Bulan</th>
                                                <th class="align-middle">Total Nominal</th>
                                                <th class="align-middle">Waktu Pembayaran</th>
                                                <th class="align-middle">Metode Pembayaran</th>
                                                <th class="align-middle">Petugas</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pembayaran as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration + ($pembayaran->currentPage() - 1) * $pembayaran->perPage() }}
                                                    </td>
                                                    <td>{{ $row?->meteran->nomor_meteran }}</td>
                                                    <td>{{ $row?->meteran->pelanggan->nama_pelanggan }}</td>
                                                    <td>{{ $row?->bulan->nama_bulan . ' ' . $row?->tahun }}</td>
                                                    <td>{{ 'Rp ' . number_format($row?->total_nominal, 0, ',', '.') }}</td>
                                                    <td>{{ $row?->waktu_pembayaran }}</td>
                                                    <td>{{ $row?->metode_pembayaran }}</td>
                                                    <td>{{ $row?->petugas }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group">
                                                            @can('pembayaran view')
                                                                <div class="me-1">
                                                                    <a href="{{ route('pembayaran.show', $row) }}"
                                                                        class="btn btn-icon btn-outline-info btn-sm"
                                                                        data-bs-toggle="tooltip" data-bs-title="Detail"
                                                                        data-bs-placement="top">
                                                                        <span class="bx bx-show"></span>
                                                                    </a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">Belum ada pembayaran</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination --}}
                                <div class="mt-3 d-flex justify-content-end">
                                    {!! $pembayaran->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            @else
                <div class="card-body">
                    <p>
                        Selamat datang <b>{{ auth()->user()->name }}</b>.
                    </p>
                </div>
            @endrole
        </div>
    </div>
</x-layout.app>
