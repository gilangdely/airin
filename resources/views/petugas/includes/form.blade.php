<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="nama_lengkap" 
                        class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" 
                        id="nama_lengkap" 
                        value="{{ old('nama_lengkap', $petugas?->nama_lengkap) }}" 
                        placeholder="Masukkan Nama Lengkap" />
                    @error('nama_lengkap')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nomor_induk_petugas" class="form-label">Nomor Induk Petugas</label>
                    <input 
                        type="text" 
                        name="nomor_induk_petugas" 
                        class="form-control {{ $errors->has('nomor_induk_petugas') ? 'is-invalid' : '' }}" 
                        id="nomor_induk_petugas" 
                        value="{{ old('nomor_induk_petugas', $petugas?->nomor_induk_petugas) }}" 
                        placeholder="Masukkan Nomor Induk Petugas" />
                    @error('nomor_induk_petugas')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input 
                        type="text" 
                        name="nomor_telepon" 
                        class="form-control {{ $errors->has('nomor_telepon') ? 'is-invalid' : '' }}" 
                        id="nomor_telepon" 
                        value="{{ old('nomor_telepon', $petugas?->nomor_telepon) }}" 
                        placeholder="Masukkan Nomor Telepon" />
                    @error('nomor_telepon')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>