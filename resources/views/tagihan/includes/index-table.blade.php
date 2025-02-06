<div class="table-responsive" >
    <table class="table table-striped" id="data-table" style="height: 100px;">
        <thead>
            <tr>
                <th>No</th>
                
                    <th class="align-middle">Id Bulan</th>
                    <th class="align-middle">Tahun</th>
                    <th class="align-middle">Id Pelanggan</th>
                    <th class="align-middle">Nominal</th>
                    <th class="align-middle">Waktu Awal</th>
                    <th class="align-middle">Waktu Akhir</th>
                    <th class="align-middle">Status Tagihan</th>
                    <th class="align-middle">Status Pembayaran</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihan as $row)
                <tr>
                    <td>{{ $loop->iteration + ($tagihan->currentPage() - 1) * $tagihan->perPage() }}</td>
                    
                    <td>{{ $row?->id_bulan }}</td>
                    <td>{{ $row?->tahun }}</td>
                    <td>{{ $row?->id_pelanggan }}</td>
                    <td>{{ $row?->nominal }}</td>
                    <td>{{ $row?->waktu_awal }}</td>
                    <td>{{ $row?->waktu_akhir }}</td>
                    <td>{{ $row?->status_tagihan }}</td>
                    <td>{{ $row?->status_pembayaran }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('tagihan view')
                                <div class="me-1">
                                    <a href="{{ route('tagihan.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('tagihan edit')
                                <div class="me-1">
                                    <a href="{{ route('tagihan.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('tagihan delete')
                                <form action="{{ route('tagihan.destroy', $row) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data tagihan ini akan dihapus!"
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
    {!! $tagihan->withQueryString()->links() !!}
</div>    