<div class="row">
    <div class="col-md-12">
          
                <div class="mb-4">
                    <label for="nama_area" class="form-label">Nama Area</label>
                    <input 
                        type="text" 
                        name="nama_area" 
                        class="form-control {{ $errors->has('nama_area') ? 'is-invalid' : '' }}" 
                        id="nama_area" 
                        value="{{ old('nama_area', $areaPetugas?->nama_area) }}" 
                        placeholder="Masukkan Nama Area" />
                    @error('nama_area')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="id_petugas" class="form-label">Petugas</label>
                    <select class="form-select" name="id_petugas" aria-label="Default select example">
                    <option selected>Pilih petugas</option>
                    @foreach($petugas as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_lengkap }}</option>
                    @endforeach
                    </select>
                    @error('id_petugas')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input 
                        type="text" 
                        name="keterangan" 
                        class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" 
                        id="keterangan" 
                        value="{{ old('keterangan', $areaPetugas?->keterangan) }}" 
                        placeholder="Masukkan Keterangan" />
                    @error('keterangan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>