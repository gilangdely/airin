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
                <td>Grand Total</td>
                <td>100000</td>
            </tr>
        </tbody>
    </table>
</div>
