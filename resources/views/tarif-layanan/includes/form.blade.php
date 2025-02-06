<div class="row">
    <div class="col-md-12">
        
                <input type="hidden" name="id_layanan" value="{{ isset($id_layanan) ? $id_layanan : $tarifLayanan?->id_layanan }}">
                <div class="mb-4">
                    <label for="tier" class="form-label">Tier</label>
                    <input 
                        type="text" 
                        name="tier" 
                        class="form-control {{ $errors->has('tier') ? 'is-invalid' : '' }}" 
                        id="tier" 
                        value="{{ old('tier', $tarifLayanan?->tier) }}" 
                        placeholder="Masukkan Tier" />
                    @error('tier')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="min_pemakaian" class="form-label">Min Pemakaian</label>
                    <x-input.currency name="min_pemakaian" id="min_pemakaian"
                        value="{{ old('min_pemakaian', $tarifLayanan?->min_pemakaian) }}" 
                        placeholder="Masukkan Min Pemakaian"
                        class="form-control text-end {{ $errors->has('min_pemakaian') ? 'is-invalid' : '' }}" />
                    @error('min_pemakaian')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="max_pemakaian" class="form-label">Max Pemakaian</label>
                    <x-input.currency name="max_pemakaian" id="max_pemakaian"
                        value="{{ old('max_pemakaian', $tarifLayanan?->max_pemakaian) }}" 
                        placeholder="Masukkan Max Pemakaian"
                        class="form-control text-end {{ $errors->has('max_pemakaian') ? 'is-invalid' : '' }}" />
                    @error('max_pemakaian')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tarif" class="form-label">Tarif</label>
                    <x-input.currency name="tarif" id="tarif"
                        value="{{ old('tarif', $tarifLayanan?->tarif) }}" 
                        placeholder="Masukkan Tarif"
                        class="form-control text-end {{ $errors->has('tarif') ? 'is-invalid' : '' }}" />
                    @error('tarif')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>