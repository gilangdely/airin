<x-layout.app title="Generate Tagihan" activeMenu="tagihan.create" :withError="false">
    <div class="container my-5">
        <x-ui.breadcrumb title="Generate Tagihan" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Generate Tagihan'],
        ]" />

        <div class="card">
            <div class="card-body">
                <x-error-list />

                <form action="{{ route('tagihan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="id_bulan" class="form-label">Bulan</label>
                                <input type="month" name="id_bulan"
                                    class="form-control "
                                    readonly
                                    id="id_bulan" value="{{ date('Y-m') }}" placeholder="Masukkan Bulan" />
                                @error('id_bulan')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="waktu_awal" class="form-label">Tgl Awal</label>
                                <input type="date" name="waktu_awal" id="waktu_awal" value="{{ date('Y-m-01') }}"
                                    class="form-control text-end" />
                                @error('waktu_awal')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="waktu_akhir" class="form-label">Tgl Akhir</label>
                                <input type="date" name="waktu_akhir" id="waktu_akhir" value="{{ date('Y-m-t') }}"
                                    class="form-control text-end {{ $errors->has('waktu_akhir') ? 'is-invalid' : '' }}" />
                                @error('waktu_akhir')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nomor_meteran" class="form-label">Nomor Meteran</label>
                                <input type="text" name="nomor_meteran"
                                    class="form-control {{ $errors->has('nomor_meteran') ? 'is-invalid' : '' }}"
                                    id="nomor_meteran" value="{{ $meteran->nomor_meteran }}" readonly
                                    placeholder="Masukkan Id Pelanggan" />
                                @error('nomor_meteran')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="id_pelanggan" class="form-label">Pelanggan</label>
                                <input type="hidden" name="id_pelanggan" value="{{ $meteran->id_pelanggan }}">
                                <input type="text" 
                                    class="form-control"
                                    id="id_pelanggan" value="{{ $meteran->pelanggan->nama_pelanggan }}" readonly  />
                                @error('id_pelanggan')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nominal" class="form-label">Nominal</label>
                                <x-input.currency name="nominal" id="nominal"
                                    value="{{ old('nominal', $totalTagihan) }}" placeholder="Masukkan Nominal"
                                    class="form-control text-end {{ $errors->has('nominal') ? 'is-invalid' : '' }}" />
                                @error('nominal')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Rincian Rencana Tagihan</p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Pemakaian</th>
                                            <th>Tarif/m3</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalTagihan = 0; ?>
                                        @foreach ($rincianTagihan as $row)
                                        <?php $totalTagihan += $row['subtotal'] ?>
                                            <tr>
                                                <td>{{ $row['bulan'] . '-' . $row['tahun'] }}</td>
                                                <td>{{ $row['pakai'].' m3' }}</td>
                                                <td>{{ 'Rp ' . number_format($row['tarif'], 0, ',', '.') }}</td>
                                                <td>{{ 'Rp ' . number_format($row['subtotal'], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td colspan="3" style="text-align: right">Total</td>
                                                <td>{{ 'Rp '.number_format($totalTagihan,0,',','.') }}</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Buat Tagihan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let today = new Date();
        let firstDay = new Date(today.getFullYear(), today.getMonth(), 1); // Tanggal 1 bulan ini
        let lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Tanggal terakhir bulan ini
        
        flatpickr("#waktu_awal", {
            dateFormat: "Y-m-d",
            minDate: firstDay, // Tanggal 1 bulan ini
            maxDate: lastDay,  // Tanggal terakhir bulan ini
            onChange: function(selectedDates, dateStr, instance) {
                let tglAkhirPicker = document.querySelector("#waktu_akhir")._flatpickr;
                if (tglAkhirPicker) {
                    tglAkhirPicker.set("minDate", dateStr); // waktu_akhir tidak boleh kurang dari waktu_awal
                }
            }
        });

        flatpickr("#waktu_akhir", {
            dateFormat: "Y-m-d",
            minDate: firstDay, // Default minDate = tanggal 1 bulan ini
            maxDate: lastDay,  // Tanggal terakhir bulan ini
        });

    });
</script>

@endpush
</x-layout.app>
