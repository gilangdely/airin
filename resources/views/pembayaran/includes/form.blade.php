
                <input type="hidden" name="id_tagihan" value="{{ $tagihan->id_tagihan }}">
                <input type="hidden" name="id_meteran" value="{{ $tagihan->id_meteran }}">
                <input type="hidden" name="id_bulan" value="{{ $tagihan->id_bulan }}">
                <input type="hidden" name="tahun" value="{{ $tagihan->tahun }}">
                <div class="mb-4">
                    <label for="total_nominal" class="form-label">Total Nominal</label>
                    <x-input.currency name="total_nominal" id="total_nominal" readonly
                        value="{{ old('total_nominal', $pembayaran->total_nominal ? $pembayaran->total_nominal : $tagihan->nominal) }}" 
                        class="form-control text-end {{ $errors->has('total_nominal') ? 'is-invalid' : '' }}" />
                    @error('total_nominal')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select class="form-select" name="metode_pembayaran" aria-label="Default select example">
                        <option selected>Pilih metode</option>
                        <option value="tunai">Tunai</option>
                        <option value="transfer_bank">Transfer Bank</option>
                        <option value="qris">QRIS</option>
                      </select>
                    @error('metode_pembayaran')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="petugas" class="form-label">Petugas</label>
                    <input 
                        type="text" 
                        name="petugas" 
                        class="form-control {{ $errors->has('petugas') ? 'is-invalid' : '' }}" 
                        id="petugas" 
                        value="{{ old('petugas', $pembayaran->petugas ? $pembayaran->petugas : auth()->user()->name) }}" 
                        readonly
                        placeholder="Masukkan Petugas" />
                    @error('petugas')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input 
                        type="text" 
                        name="catatan" 
                        class="form-control {{ $errors->has('catatan') ? 'is-invalid' : '' }}" 
                        id="catatan" 
                        value="{{ old('catatan', $pembayaran?->catatan) }}" 
                        placeholder="Masukkan catatan" />
                    @error('catatan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>