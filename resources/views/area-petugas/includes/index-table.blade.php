<div class="table-responsive" >
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                
                    <th class="align-middle">Nama Area</th>
                    <th class="align-middle">Id Petugas</th>
                    <th class="align-middle">Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areaPetugas as $row)
                <tr>
                    <td>{{ $loop->iteration + ($areaPetugas->currentPage() - 1) * $areaPetugas->perPage() }}</td>
                    
                    <td>{{ $row?->nama_area }}</td>
                    <td>{{ $row?->petugas->nama_lengkap }}</td>
                    <td>{{ $row?->keterangan }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('area-petugas view')
                                <div class="me-1">
                                    <a href="{{ route('area-petugas.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('area-petugas edit')
                                <div class="me-1">
                                    <a href="{{ route('area-petugas.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('area-petugas delete')
                                <form action="{{ route('area-petugas.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data area petugas ini akan dihapus!"
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
    {!! $areaPetugas->withQueryString()->links() !!}
</div>    