<?php

use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\HomePetugasController;
use App\Http\Controllers\API\PelangganController;
use Illuminate\Http\Request;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PemakaianController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\TagihanController;
use Illuminate\Support\Facades\Route;

Route::get('storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);

    if (!file_exists($fullPath)) {
        abort(404);
    }

    return response()->file($fullPath, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET',
        'Cache-Control' => 'public, max-age=31536000'
    ]);
})->where('path', '.*');

Route::post('/login', [AuthController::class, 'login']);  // ok

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'me']); // ok
    Route::post('/user', [UserController::class, 'updateProfile']); // ok
    Route::post('/loginpetugas', [UserController::class, 'loginPetugas']);
    Route::post('/user/change-password', [UserController::class, 'changePassword']); // ok
    Route::post('/logout', [AuthController::class, 'logout']); // ok

    Route::get('/pemakaian/create/{meteran}', [PemakaianController::class, 'create']); // ok
    Route::post('/pemakaian/create', [PemakaianController::class, 'store']); // ok
    Route::get('/tagihan/create/{meteran}', [TagihanController::class, 'create']); // ok
    Route::post('/tagihan', [TagihanController::class, 'store']); // ok

    Route::get('/pemakaian', [PemakaianController::class, 'index']); // ok
    Route::post('/pemakaian/meteran', [PemakaianController::class, 'pemakaianByMeteran']); // ok
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);

    Route::delete('/pemakaian/{pemakaian}', [PemakaianController::class, 'destroy']);

    Route::get('/pembayaran/meteran/{nomor_meteran}', [PembayaranController::class, 'PembayaranByMeteran']);

    Route::post('/tagihan/meteran', [TagihanController::class, 'cekTagihanByMeteran']); // ok

    Route::get('/pakai-by-tagihan', [TagihanController::class, 'getTotalTagihanPetugas']);

    Route::post('/pelanggan/update', [PelangganController::class, 'UpdateData']);

    Route::post('/pelanggan/by-id', [UserController::class, 'getById']);

    Route::post('/home/meteranbypetugas',[HomePetugasController::class, 'getMeteranByPetugas']);

    Route::get('/getunpaidinvoice', [HomeController::class, 'getunpaidinvoice']);
    Route::post('/getmeteranbypelanggan', [HomeController::class, 'getmeteranbypelanggan']);
    Route::post('/gettagihanbymeteranaktif', [HomeController::class, 'gettagihanbymeteranaktif']);
    Route::post('/riwayattagihanbymeteran', [HomeController::class, 'riwayattagihanbymeteran']);
    
});
