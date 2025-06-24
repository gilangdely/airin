<div class="table-responsive">
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>

                <th class="align-middle">Nama Pelanggan</th>
                <th class="align-middle">Nomor Meteran</th>
                <th class="align-middle">Layanan</th>
                <th class="align-middle">Tanggal Pemasangan</th>
                <th class="align-middle">Area</th>
                <th class="align-middle">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meteran as $row)
                <tr>
                    <td>{{ $loop->iteration + ($meteran->currentPage() - 1) * $meteran->perPage() }}</td>

                    <td>{{ $row->pelanggan?->nama_pelanggan }}</td>
                    <td>{{ $row?->nomor_meteran }}</td>
                    <td>{{ $row->layanan?->nama_layanan }}</td>
                    <td>{{ date('d-M-Y', strtotime($row?->tanggal_pemasangan)) }}</td>
                    <td>{{ $row?->areapetugas->nama_area }}</td>
                    <td>
                        @if ($row?->status == 1)
                            <span class="badge bg-label-success">Aktif</span>
                        @else
                            <span class="badge bg-label-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('meteran view')
                                <div class="me-1">
                                    <a href="{{ route('meteran.show', $row) }}" class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Detail" data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('meteran edit')
                                <div class="me-1">
                                    <a href="{{ route('meteran.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-title="Edit" data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('meteran delete')
                                <form action="{{ route('meteran.destroy', $row) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data meteran ini akan dihapus!" positive="Ya, hapus!"
                                        icon="info" class="btn btn-icon btn-outline-danger btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Hapus" data-bs-placement="top">
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
    {!! $meteran->withQueryString()->links() !!}
</div>
