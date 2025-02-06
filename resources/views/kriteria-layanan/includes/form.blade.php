<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id_layanan"
            value="{{ isset($kriteriaLayanan->id_layanan) ? $kriteriaLayanan->id_layanan : $id_layanan }}">
        <div class="mb-4">
            <label for="kriteria" class="form-label">Kriteria</label>
            <input type="text" name="kriteria" class="form-control {{ $errors->has('kriteria') ? 'is-invalid' : '' }}"
                id="kriteria" value="{{ old('kriteria', $kriteriaLayanan?->kriteria) }}"
                placeholder="Masukkan Kriteria" />
            @error('kriteria')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status_aktif" class="form-label">Status Aktif</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status_aktif" id="status_aktif1" value="1" {{ ($kriteriaLayanan?->status_aktif == 1) ? 'checked' : '' }}>
                <label class="form-check-label" for="status_aktif1">
                    Aktif
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status_aktif" id="status_aktif2" value="0" {{ ($kriteriaLayanan?->status_aktif == 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="status_aktif2">
                    Tidak Aktif
                </label>
            </div>
            @error('status_aktif')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
