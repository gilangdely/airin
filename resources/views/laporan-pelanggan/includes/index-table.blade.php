<div class="table-responsive">
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                <th class="align-middle">Nomor Meteran</th>
                <th class="align-middle">Pelanggan</th>
                <th class="align-middle">Layanan</th>
                <th class="align-middle">BLN Tagihan</th>
                <th class="align-middle">Nominal</th>
                <th class="align-middle">TGL Pembayaran</th>
                <th class="align-middle">Pembayaran</th>
                <th class="align-middle">Petugas</th>
            </tr>
        </thead>
        <tbody>
            @if ($meteran->count() > 0)
                @foreach ($meteran as $row)
                    <tr>
                        <td>{{ $loop->iteration + ($meteran->currentPage() - 1) * $meteran->perPage() }}</td>
                        <td>{{ $row['nomor_meteran'] }}</td>
                        <td>{{ $row['pelanggan']['nama_pelanggan'] }}</td>
                        <td>{{ $row['layanan']['nama_layanan'] }}</td>
                        <td>{{ $row['nama_bulan'] }}</td>
                        <td>Rp {{ number_format($row['total_nominal'], 0, ',', '.') }}</td>
                        <td>{{ date('d-M-Y H:i:s', strtotime($row['waktu_pembayaran'])) }}</td>
                        <td>{{ $row['metode_pembayaran'] }}</td>
                        <td>{{ $row['petugas'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">Data tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if ($meteran->count() > 0)
    <div class="mt-3 d-flex justify-content-end">
        {!! $meteran->withQueryString()->links() !!}
    </div>
@endif
