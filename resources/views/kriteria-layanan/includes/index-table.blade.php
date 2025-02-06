<div class="table-responsive" >
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                
                    <th class="align-middle">Id Layanan</th>
                    <th class="align-middle">Kriteria</th>
                    <th class="align-middle">Status Aktif</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteriaLayanan as $row)
                <tr>
                    <td>{{ $loop->iteration + ($kriteriaLayanan->currentPage() - 1) * $kriteriaLayanan->perPage() }}</td>
                    
                    <td>{{ $row?->id_layanan }}</td>
                    <td>{{ $row?->kriteria }}</td>
                    <td>{{ $row?->status_aktif }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('kriteria-layanan view')
                                <div class="me-1">
                                    <a href="{{ route('kriteria-layanan.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('kriteria-layanan edit')
                                <div class="me-1">
                                    <a href="{{ route('kriteria-layanan.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('kriteria-layanan delete')
                                <form action="{{ route('kriteria-layanan.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data kriteria layanan ini akan dihapus!"
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
    {!! $kriteriaLayanan->withQueryString()->links() !!}
</div>    