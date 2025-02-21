<div class="row">
    <div class="col-md-12">

        <div class="mb-4">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select class="select2 form-select" name="id_pelanggan" aria-label="Default select example">
                <option>Pilih pelanggan</option>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}"
                        {{ $meteran->id_pelanggan == $pelanggan->id_pelanggan ? 'selected' : '' }}>
                        {{ $pelanggan->id_pelanggan . ' - ' . $pelanggan->nama_pelanggan }}</option>
                @endforeach
            </select>
            @error('id_pelanggan')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="nomor_meteran" class="form-label">Nomor Meteran</label>
            <input type="text" name="nomor_meteran"
                class="form-control {{ $errors->has('nomor_meteran') ? 'is-invalid' : '' }}" id="nomor_meteran"
                value="{{ old('nomor_meteran', $meteran?->nomor_meteran) }}" placeholder="Masukkan nomor meteran" />
            @error('nomor_meteran')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="id_layanan" class="form-label">Layanan</label>
            <select class="select2 form-select" name="id_layanan" aria-label="Default select example">
                <option>Pilih layanan</option>
                @foreach ($layanans as $layanan)
                    <option value="{{ $layanan->id_layanan }}"
                        {{ $meteran->id_layanan == $layanan->id_layanan ? 'selected' : '' }}>
                        {{ $layanan->id_layanan . ' - ' . $layanan->nama_layanan }}
                    </option>
                @endforeach
            </select>
            @error('id_layanan')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lokasi_pemasangan" class="form-label">Lokasi Pemasangan</label>
            <input type="text" name="lokasi_pemasangan"
                class="form-control {{ $errors->has('lokasi_pemasangan') ? 'is-invalid' : '' }}" id="lokasi_pemasangan"
                value="{{ old('lokasi_pemasangan', $meteran?->lokasi_pemasangan) }}"
                placeholder="Masukkan lokasi pemasangan" />
            @error('lokasi_pemasangan')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tanggal_pemasangan" class="form-label">Tanggal Pemasangan</label>
            <input type="date" name="tanggal_pemasangan"
                class="form-control {{ $errors->has('tanggal_pemasangan') ? 'is-invalid' : '' }}"
                id="tanggal_pemasangan" value="{{ old('tanggal_pemasangan', date('Y-m-d',strtotime($meteran?->tanggal_pemasangan))) }}"
                placeholder="Masukkan Tanggal Pemasangan" />
            @error('tanggal_pemasangan')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="form-label">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="status" id="status2"
                    {{ ($meteran->status ?? null) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="status2">Aktif</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="status" id="status1"
                    {{ ($meteran->status ?? null) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="status1">Tidak Aktif</label>
            </div>


            @error('status')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>
