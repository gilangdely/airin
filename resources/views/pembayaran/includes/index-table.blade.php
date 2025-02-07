<div class="table-responsive" >
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
            @foreach ($pembayaran as $row)
                <tr>
                    <td>{{ $loop->iteration + ($pembayaran->currentPage() - 1) * $pembayaran->perPage() }}</td>
                    
                    <td>{{ $row?->meteran->nomor_meteran }}</td>
                    <td>{{ $row?->meteran->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $row?->bulan->nama_bulan.' '.$row?->tahun }}</td>
                    <td>{{ "Rp ".number_format($row?->total_nominal,0,',','.') }}</td>
                    <td>{{ $row?->waktu_pembayaran }}</td>
                    <td>{{ $row?->metode_pembayaran }}</td>
                    <td>{{ $row?->petugas }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('pembayaran view')
                                <div class="me-1">
                                    <a href="{{ route('pembayaran.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('pembayaran edit')
                                <div class="me-1">
                                    <a href="{{ route('pembayaran.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('pembayaran delete')
                                <form action="{{ route('pembayaran.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data pembayaran ini akan dihapus!"
                                        positive="Ya, hapus!" icon="info"
                                        class="btn btn-icon btn-outline-danger btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Hapus"
                                        data-bs-placement="top">
                                        <span class="bx bx-trash"></span>
                                    </x-input.confirm-button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-3 d-flex justify-content-end">
    {!! $pembayaran->withQueryString()->links() !!}
</div>    