<?php

use App\Http\Controllers\KriteriaLayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
<<<<<<< HEAD
use App\Http\Controllers\LaporanPelangganController;
use App\Http\Controllers\LaporanPembayaranController;
=======
>>>>>>> bf6bd19c5d5d89a434d7d9001da9131581d80e42
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MeteranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifLayananController;
use App\Http\Controllers\LaporanPembayaranController;

require('auth.php');

/* 
 * Tidak bisa diakses jika sudah login.
 */
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');
});

/* 
 * Perlu login untuk mengakses
 */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('pelanggan', PelangganController::class);
    Route::resource('layanan', LayananController::class);

    Route::get('pemakaian/cekmeteran', [PemakaianController::class, 'cekmeteran'])->name('pemakaian.cekmeteran');
    Route::post('pemakaian/storecekmeteran', [PemakaianController::class, 'storecekmeteran'])->name('pemakaian.storecekmeteran');
    // Route::resource('pemakaian', PemakaianController::class);
    // Route::resource('pembayaran', PembayaranController::class);
    // Route::resource('kriteria-layanan', KriteriaLayananController::class);
    // Route::resource('tarif-layanan', TarifLayananController::class);

    Route::get('pemakaian', [PemakaianController::class, 'index'])->name('pemakaian.index');
    Route::get('pemakaian/create/{meteran}', [PemakaianController::class, 'create'])->name('pemakaian.create');
    Route::post('pemakaian', [PemakaianController::class, 'store'])->name('pemakaian.store');
    Route::get('pemakaian/{pemakaian}', [PemakaianController::class, 'show'])->name('pemakaian.show');
    Route::get('pemakaian/{pemakaian}/edit', [PemakaianController::class, 'edit'])->name('pemakaian.edit');
    Route::put('pemakaian/{pemakaian}', [PemakaianController::class, 'update'])->name('pemakaian.update');
    Route::delete('pemakaian/{pemakaian}', [PemakaianController::class, 'destroy'])->name('pemakaian.destroy');

    Route::get('kriteria-layanan', [KriteriaLayananController::class, 'index'])->name('kriteria-layanan.index');
    Route::get('kriteria-layanan/create/{id_layanan}', [KriteriaLayananController::class, 'create'])->name('kriteria-layanan.create');
    Route::post('kriteria-layanan', [KriteriaLayananController::class, 'store'])->name('kriteria-layanan.store');
    Route::get('kriteria-layanan/{kriteria_layanan}', [KriteriaLayananController::class, 'show'])->name('kriteria-layanan.show');
    Route::get('kriteria-layanan/{kriteria_layanan}/edit', [KriteriaLayananController::class, 'edit'])->name('kriteria-layanan.edit');
    Route::put('kriteria-layanan/{kriteria_layanan}', [KriteriaLayananController::class, 'update'])->name('kriteria-layanan.update');
    Route::delete('kriteria-layanan/{kriteria_layanan}', [KriteriaLayananController::class, 'destroy'])->name('kriteria-layanan.destroy');

    Route::get('tarif-layanan', [TarifLayananController::class, 'index'])->name('tarif-layanan.index');
    Route::get('tarif-layanan/create/{id_layanan}', [TarifLayananController::class, 'create'])->name('tarif-layanan.create');
    Route::post('tarif-layanan', [TarifLayananController::class, 'store'])->name('tarif-layanan.store');
    Route::get('tarif-layanan/{tarif_layanan}', [TarifLayananController::class, 'show'])->name('tarif-layanan.show');
    Route::get('tarif-layanan/{tarif_layanan}/edit', [TarifLayananController::class, 'edit'])->name('tarif-layanan.edit');
    Route::put('tarif-layanan/{tarif_layanan}', [TarifLayananController::class, 'update'])->name('tarif-layanan.update');
    Route::delete('tarif-layanan/{tarif_layanan}', [TarifLayananController::class, 'destroy'])->name('tarif-layanan.destroy');

    Route::get('tagihan/cektagihanpelanggan/{meteran}', [TagihanController::class, 'cektagihanpelanggan'])->name('tagihan.cektagihanpelanggan');
    Route::get('tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::get('tagihan/create/{meteran}', [TagihanController::class, 'create'])->name('tagihan.create');
    Route::post('tagihan', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::get('tagihan/{tagihan}', [TagihanController::class, 'show'])->name('tagihan.show');
    Route::get('tagihan/{tagihan}/edit', [TagihanController::class, 'edit'])->name('tagihan.edit');
    Route::put('tagihan/{tagihan}', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::delete('tagihan/{tagihan}', [TagihanController::class, 'destroy'])->name('tagihan.destroy');

    Route::get('meteran', [MeteranController::class, 'index'])->name('meteran.index');
    Route::get('meteran/create', [MeteranController::class, 'create'])->name('meteran.create');
    Route::post('meteran', [MeteranController::class, 'store'])->name('meteran.store');
    Route::post('meteran/mapping', [MeteranController::class, 'mapping'])->name('meteran.mapping');
    Route::get('meteran/{meteran}', [MeteranController::class, 'show'])->name('meteran.show');
    Route::get('meteran/{meteran}/edit', [MeteranController::class, 'edit'])->name('meteran.edit');
    Route::put('meteran/{meteran}', [MeteranController::class, 'update'])->name('meteran.update');
    Route::delete('meteran/{meteran}', [MeteranController::class, 'destroy'])->name('meteran.destroy');

    Route::delete('pembayaran/{pembayaran}/pembatalan', [PembayaranController::class, 'pembatalan'])->name('pembayaran.pembatalan');
    Route::get('pembayaran/{pembayaran}/cetakkuitansi', [PembayaranController::class, 'cetakkuitansi'])->name('pembayaran.cetakkuitansi');
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/create/{tagihan}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('pembayaran/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::get('pembayaran/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('pembayaran/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('pembayaran/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
    
    Route::get('laporan-pembayaran', [LaporanPembayaranController::class, 'index'])->name('laporan-pembayaran.index');
    Route::get('laporan-pembayaran/{pembayaran}', [LaporanPembayaranController::class, 'show'])->name('laporan-pembayaran.show');
    
    Route::get('laporan-pelanggan', [LaporanPelangganController::class, 'index'])->name('laporan-pelanggan.index');
});
