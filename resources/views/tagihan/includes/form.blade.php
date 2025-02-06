<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="id_bulan" class="form-label">Id Bulan</label>
                    <input 
                        type="text" 
                        name="id_bulan" 
                        class="form-control {{ $errors->has('id_bulan') ? 'is-invalid' : '' }}" 
                        id="id_bulan" 
                        value="{{ old('id_bulan', $tagihan?->id_bulan) }}" 
                        placeholder="Masukkan Id Bulan" />
                    @error('id_bulan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tahun" class="form-label">Tahun</label>
                    <x-input.currency name="tahun" id="tahun"
                        value="{{ old('tahun', $tagihan?->tahun) }}" 
                        placeholder="Masukkan Tahun"
                        class="form-control text-end {{ $errors->has('tahun') ? 'is-invalid' : '' }}" />
                    @error('tahun')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                    <input 
                        type="text" 
                        name="id_pelanggan" 
                        class="form-control {{ $errors->has('id_pelanggan') ? 'is-invalid' : '' }}" 
                        id="id_pelanggan" 
                        value="{{ old('id_pelanggan', $tagihan?->id_pelanggan) }}" 
                        placeholder="Masukkan Id Pelanggan" />
                    @error('id_pelanggan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nominal" class="form-label">Nominal</label>
                    <x-input.currency name="nominal" id="nominal"
                        value="{{ old('nominal', $tagihan?->nominal) }}" 
                        placeholder="Masukkan Nominal"
                        class="form-control text-end {{ $errors->has('nominal') ? 'is-invalid' : '' }}" />
                    @error('nominal')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>