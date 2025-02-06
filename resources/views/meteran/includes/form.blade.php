<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                    <input 
                        type="text" 
                        name="id_pelanggan" 
                        class="form-control {{ $errors->has('id_pelanggan') ? 'is-invalid' : '' }}" 
                        id="id_pelanggan" 
                        value="{{ old('id_pelanggan', $meteran?->id_pelanggan) }}" 
                        placeholder="Masukkan Id Pelanggan" />
                    @error('id_pelanggan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nomor_meteran" class="form-label">Nomor Meteran</label>
                    <input 
                        type="text" 
                        name="nomor_meteran" 
                        class="form-control {{ $errors->has('nomor_meteran') ? 'is-invalid' : '' }}" 
                        id="nomor_meteran" 
                        value="{{ old('nomor_meteran', $meteran?->nomor_meteran) }}" 
                        placeholder="Masukkan nomor meteran" />
                    @error('nomor_meteran')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="id_layanan" class="form-label">Id Layanan</label>
                    <x-input.currency name="id_layanan" id="id_layanan"
                        value="{{ old('id_layanan', $meteran?->id_layanan) }}" 
                        placeholder="Masukkan Id Layanan"
                        class="form-control text-end {{ $errors->has('id_layanan') ? 'is-invalid' : '' }}" />
                    @error('id_layanan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="lokasi_pemasangan" class="form-label">Lokasi Pemasangan</label>
                    <input 
                        type="text" 
                        name="lokasi_pemasangan" 
                        class="form-control {{ $errors->has('lokasi_pemasangan') ? 'is-invalid' : '' }}" 
                        id="lokasi_pemasangan" 
                        value="{{ old('lokasi_pemasangan', $meteran?->lokasi_pemasangan) }}" 
                        placeholder="Masukkan lokasi pemasangan" />
                    @error('lokasi_pemasangan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tanggal_pemasangan" class="form-label">Tanggal Pemasangan</label>
                    <input 
                        type="date" 
                        name="tanggal_pemasangan" 
                        class="form-control {{ $errors->has('tanggal_pemasangan') ? 'is-invalid' : '' }}" 
                        id="tanggal_pemasangan" 
                        value="{{ old('tanggal_pemasangan', $meteran?->tanggal_pemasangan) }}" 
                        placeholder="Masukkan Tanggal Pemasangan" />
                    @error('tanggal_pemasangan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <input 
                        type="text" 
                        name="status" 
                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" 
                        id="status" 
                        value="{{ old('status', $meteran?->status) }}" 
                        placeholder="Masukkan status" />
                    @error('status')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                
    </div>
</div>