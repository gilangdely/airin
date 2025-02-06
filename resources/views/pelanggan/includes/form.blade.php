<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input 
                        type="text" 
                        name="nama_pelanggan" 
                        class="form-control {{ $errors->has('nama_pelanggan') ? 'is-invalid' : '' }}" 
                        id="nama_pelanggan" 
                        value="{{ old('nama_pelanggan', $pelanggan?->nama_pelanggan) }}" 
                        placeholder="Masukkan Nama Pelanggan" />
                    @error('nama_pelanggan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_ktp" class="form-label">No Ktp</label>
                    <input 
                        type="text" 
                        name="no_ktp" 
                        class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" 
                        id="no_ktp" 
                        value="{{ old('no_ktp', $pelanggan?->no_ktp) }}" 
                        placeholder="Masukkan No Ktp" />
                    @error('no_ktp')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input 
                        type="text" 
                        name="no_hp" 
                        class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" 
                        id="no_hp" 
                        value="{{ old('no_hp', $pelanggan?->no_hp) }}" 
                        placeholder="Masukkan No Hp" />
                    @error('no_hp')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input 
                        type="text" 
                        name="alamat" 
                        class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" 
                        id="alamat" 
                        value="{{ old('alamat', $pelanggan?->alamat) }}" 
                        placeholder="Masukkan Alamat" />
                    @error('alamat')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <input 
                        type="text" 
                        name="status" 
                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" 
                        id="status" 
                        value="{{ old('status', $pelanggan?->status) }}" 
                        placeholder="Masukkan Status" />
                    @error('status')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>