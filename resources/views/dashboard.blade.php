<x-layout.app title="Dashboard" activeMenu="dashboard" :withError="true">
    <div class="container my-5">
        <div class="card">
            <div class="card-header h4">{{ __('Dashboard') }}</div>

            @role('Admin')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 align-items-stretch"
                        style="rgba(255, 255, 255, 0.5);">
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-white bi bi-people-fill rounded h5 bg-primary px-3 py-2  border border-primary border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">{{ $pelanggan }}</span>
                                    </p>
                                    <p class="card-text text-start">Total pelanggan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-white bi bi-speedometer rounded h5 bg-warning px-3 py-2 border border-warning border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">{{ $meteran }}</span>
                                    </p>
                                    <p class="card-text text-start">Total meteran aktif</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-white bi bi-receipt rounded h5 bg-danger px-3 py-2 border border-danger border-opacity-50 me-4"></i>
                                        <span class="h5 fw-bold">{{ $totaltagihan }}</span>
                                    </p>
                                    <p class="card-text text-start">Total tagihan aktif</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <p class="text-start card-title mb-4">
                                        <i
                                            class="text-white bi bi-cash-stack rounded h5 bg-success px-3 py-2 border border-success border-opacity-50 me-4"></i>
                                        <span
                                            class="h5 fw-bold">{{ 'Rp' . number_format($totalNominal, 0, ',', '.') }}</span>
                                    </p>
                                    <p class="card-text text-start">Total pembayaran bulan ini</p>
                                </div>
                            </div>
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
                                    Pembayaran terakhir
                                </button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane show  active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="table-responsive">
                                    <h5 class="card-header">Daftar tunggakan pemakaian</h5>
                                    <table class="table table-striped" id="data-table" style="height: 100px;">
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
                                                    <td colspan="9" class="text-center">Tidak ada tunggakan</td>
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
                                    <table class="table table-striped" id="data-table" style="height: 100px;">
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
                        Selamat datang <b>{{ auth()->user()->name; }}</b>.
                    </p>
                </div>
            @endrole
        </div>
    </div>
</x-layout.app>
