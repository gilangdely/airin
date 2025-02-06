<div class="table-responsive" >
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                
                    <th class="align-middle">ID Pelanggan</th>
                    <th class="align-middle">Nama Pelanggan</th>
                    <th class="align-middle">No Ktp</th>
                    <th class="align-middle">Alamat</th>
                    <th class="align-middle">No Hp</th>
                    <th class="align-middle">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $row)
                <tr>
                    <td>{{ $loop->iteration + ($pelanggan->currentPage() - 1) * $pelanggan->perPage() }}</td>
                    
                    <td>{{ $row?->id_pelanggan }}</td>
                    <td>{{ $row?->nama_pelanggan }}</td>
                    <td>{{ $row?->no_ktp }}</td>
                    <td>{{ $row?->alamat }}</td>
                    <td>{{ $row?->no_hp }}</td>
                    <td>{{ $row?->status }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('pelanggan view')
                                <div class="me-1">
                                    <a href="{{ route('pelanggan.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('pelanggan edit')
                                <div class="me-1">
                                    <a href="{{ route('pelanggan.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('pelanggan delete')
                                <form action="{{ route('pelanggan.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data pelanggan ini akan dihapus!"
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
    {!! $pelanggan->withQueryString()->links() !!}
</div>    