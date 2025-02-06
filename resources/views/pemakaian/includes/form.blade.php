<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="id_meteran" class="form-label">Id Meteran</label>
                    <input 
                        type="text" 
                        name="id_meteran" 
                        class="form-control {{ $errors->has('id_meteran') ? 'is-invalid' : '' }}" 
                        id="id_meteran" 
                        value="{{ old('id_meteran', $pemakaian?->id_meteran) }}" 
                        placeholder="Masukkan Id Meteran" />
                    @error('id_meteran')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input 
                        type="text" 
                        name="bulan" 
                        class="form-control {{ $errors->has('bulan') ? 'is-invalid' : '' }}" 
                        id="bulan" 
                        value="{{ old('bulan', $pemakaian?->bulan) }}" 
                        placeholder="Masukkan Bulan" />
                    @error('bulan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input 
                        type="text" 
                        name="tahun" 
                        class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" 
                        id="tahun" 
                        value="{{ old('tahun', $pemakaian?->tahun) }}" 
                        placeholder="Masukkan Tahun" />
                    @error('tahun')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="akhir" class="form-label">Akhir</label>
                    <x-input.currency name="akhir" id="akhir"
                        value="{{ old('akhir', $pemakaian?->akhir) }}" 
                        placeholder="Masukkan Akhir"
                        class="form-control text-end {{ $errors->has('akhir') ? 'is-invalid' : '' }}" />
                    @error('akhir')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>