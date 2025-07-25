<div class="table-responsive" >
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                
                    <th class="align-middle">Nama Lengkap</th>
                    <th class="align-middle">Nomor Induk Petugas</th>
                    <th class="align-middle">Nomor Telepon</th>
                    <th class="align-middle">Alamat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $row)
                <tr>
                    <td>{{ $loop->iteration + ($petugas->currentPage() - 1) * $petugas->perPage() }}</td>
                    
                    <td>{{ $row?->nama_lengkap }}</td>
                    <td>{{ $row?->nomor_induk_petugas }}</td>
                    <td>{{ $row?->nomor_telepon }}</td>
                    <td>{{ $row?->alamat }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('petugas view')
                                <div class="me-1">
                                    <a href="{{ route('petugas.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('petugas edit')
                                <div class="me-1">
                                    <a href="{{ route('petugas.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('petugas delete')
                                <form action="{{ route('petugas.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data petugas ini akan dihapus!"
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
    {!! $petugas->withQueryString()->links() !!}
</div>    