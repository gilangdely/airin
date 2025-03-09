<div class="table-responsive">
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>

                <th class="align-middle">Nomor Meteran</th>
                <th class="align-middle">Nama Pelanggan</th>
                <th class="align-middle">Bulan</th>
                <th class="align-middle">Tahun</th>
                <th class="align-middle">Awal</th>
                <th class="align-middle">Akhir</th>
                <th class="align-middle">Pakai</th>
                <th class="align-middle">Status Bayar</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemakaian as $row)
                <tr>
                    <td>{{ $loop->iteration + ($pemakaian->currentPage() - 1) * $pemakaian->perPage() }}</td>

                    <td>{{ $row?->meteran->nomor_meteran }}</td>
                    <td>{{ $row?->meteran->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $row?->tblbulan->nama_bulan }}</td>
                    <td>{{ $row?->tahun }}</td>
                    <td>{{ $row?->awal }}</td>
                    <td>{{ $row?->akhir }}</td>
                    <td>{{ $row?->pakai }}</td>
                    {{-- <td>{{ $row?->created_at }}</td> --}}
                    <td>
                        @if ($row?->status_pembayaran == 1)
                            <span class="badge bg-label-success">Lunas</span>
                        @else
                            <span class="badge bg-label-danger">Belum Bayar</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('pemakaian view')
                                <div class="me-1">
                                    <a href="{{ route('pemakaian.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm" data-bs-toggle="tooltip"
                                        data-bs-title="Detail" data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @if ($row->status_pembayaran == 0)
                                @can('pemakaian edit')
                                    <div class="me-1">
                                        <a href="{{ route('pemakaian.edit', $row) }}"
                                            class="btn btn-icon btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                                            data-bs-title="Edit" data-bs-placement="top">
                                            <span class="bx bx-pencil"></span>
                                        </a>
                                    </div>
                                @endcan
                                @can('pemakaian delete')
                                    <form action="{{ route('pemakaian.destroy', $row) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-input.confirm-button text="Data pemakaian ini akan dihapus!"
                                            positive="Ya, hapus!" icon="info"
                                            class="btn btn-icon btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                                            data-bs-title="Hapus" data-bs-placement="top">
                                            <span class="bx bx-trash"></span>
                                        </x-input.confirm-button>
                                    </form>
                                @endcan
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-3 d-flex justify-content-end">
    {!! $pemakaian->withQueryString()->links() !!}
</div>
