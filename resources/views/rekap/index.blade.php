<x-layout.app title="Rekap Pembayaran" :withError="true">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Rekap Pembayaran" :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => url('/')],
                ['label' => 'Rekap Pembayaran'],
            ]" />

        <div class="card">
            <div class="card-header">
                <div class="row g-3 justify-content-between align-items-center">                
                    <form action="{{ route('rekap.index') }}" method="GET" class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <input type="date" name="awal" class="form-control mb-2" id="awal" 
                                       placeholder="Masukkan Tanggal Awal" value="{{ $tanggalAwal ?? now()->toDateString() }}">
                            </div>
                            <div class="col-auto">
                                <label>s.d</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="akhir" class="form-control mb-2" id="akhir" 
                                       placeholder="Masukkan Tanggal Akhir" value="{{ $tanggalAkhir ?? now()->toDateString() }}">
                            </div>
                            <div class="col-auto">
                                <select name="nama_layanan" id="nama_layanan" class="form-select mb-2 ">
                                    <option value="">Semua Layanan</option>
                                    @foreach ($layananList as $layanan)
                                        <option value="{{ $layanan->nama_layanan }}"
                                            {{ request('nama_layanan') == $layanan->nama_layanan ? 'selected' : '' }}>
                                            {{ $layanan->nama_layanan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Cari</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="card-body table-container">
                <div id="search-loading" class="htmx-indicator">
                    <div class="flex-row px-4 py-3 mx-auto mt-5 text-center card d-flex justify-content-center justify-items-center"
                        style="width: 200px;">
                        <div class="px-2 d-flex align-items-center">
                            <div class="loading-spinner"></div>
                        </div>
                        <span>Sedang mencari pembayaran...</span>
                    </div>
                </div>

                <div id="rekap-table">
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-table" style="height: 100px;">
                            <thead>
                                <tr>
                                    {{-- <th>ID Layanan</th> --}}
                                    <th>Nama Layanan</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Total Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        {{-- <td>{{ $result->id_layanan }}</td> --}}
                                        <td>{{ $result->nama_layanan }}</td>
                                        <td>{{ $result->jumlah_pembayaran }}</td>
                                        <td>{{ 'Rp' . number_format($result->total_pembayaran, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Grand Total</strong></td>

                                    <td><strong>{{ $grandJumlahPembayaran }}</strong></td>
                                    <td><strong>{{ 'Rp' . number_format($grandTotal, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
