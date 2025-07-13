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
                    <label for="id_petugas" class="form-label">Id Petugas</label>
                    <x-input.currency name="id_petugas" id="id_petugas"
                        value="{{ old('id_petugas', $areaPetugas?->id_petugas) }}" 
                        placeholder="Masukkan Id Petugas"
                        class="form-control text-end {{ $errors->has('id_petugas') ? 'is-invalid' : '' }}" />
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