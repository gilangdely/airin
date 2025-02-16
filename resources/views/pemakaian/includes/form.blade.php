<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="nomor_meteran" class="form-label">Nomor Meteran</label>
                    <input 
                        type="text" 
                        name="nomor_meteran" 
                        class="form-control {{ $errors->has('nomor_meteran') ? 'is-invalid' : '' }}" 
                        id="nomor_meteran" 
                        readonly
                        value="{{ isset($pemakaian->nomor_meteran) ? $pemakaian->nomor_meteran : $meteran->nomor_meteran }}" 
                        placeholder="Masukkan Nomor Meteran" />
                    @error('nomor_meteran')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input 
                        type="month" 
                        name="bulan" 
                        class="form-control {{ $errors->has('bulan') ? 'is-invalid' : '' }}" 
                        id="bulan" 
                        value="{{ old('bulan', $pemakaian?->bulan) }}" 
                        placeholder="Masukkan Bulan" />
                    @error('bulan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="akhir" class="form-label">Meteran bulan lalu {{ $pemakaian?->tblbulan?->nama_bulan ? '('.$pemakaian->tblbulan->nama_bulan.')' : '' }}</label>
                    <x-input.currency name="akhir" id="akhir"
                        value="{{ $pemakaian->akhir ?? 0 }}" 
                        placeholder="Masukkan meteran saat ini"
                        readonly
                        class="form-control text-end {{ $errors->has('akhir') ? 'is-invalid' : '' }}" />
                    @error('akhir')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="akhir" class="form-label">Meteran saat ini</label>
                    <x-input.currency name="akhir" id="akhir"
                        value="{{ old('akhir') }}" 
                        placeholder="Masukkan meteran saat ini"
                        class="form-control text-end {{ $errors->has('akhir') ? 'is-invalid' : '' }}" />
                    @error('akhir')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>