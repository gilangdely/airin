<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                    <input 
                        type="text" 
                        name="nama_layanan" 
                        class="form-control {{ $errors->has('nama_layanan') ? 'is-invalid' : '' }}" 
                        id="nama_layanan" 
                        value="{{ old('nama_layanan', $layanan?->nama_layanan) }}" 
                        placeholder="Masukkan Nama Layanan" />
                    @error('nama_layanan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>