<?php

use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\HomeController;
use Illuminate\Http\Request;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PemakaianController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\TagihanController;

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
    Route::post('/user', [UserController::class, 'updateProfile']); // ok
    Route::post('/user/change-password', [UserController::class, 'changePassword']); // ok
    Route::post('/logout', [AuthController::class, 'logout']); // ok

    Route::get('/getunpaidinvoice', [HomeController::class, 'getunpaidinvoice']);
    Route::post('/getmeteranbypelanggan', [HomeController::class, 'getmeteranbypelanggan']);
    Route::post('/gettagihanbymeteranaktif', [HomeController::class, 'gettagihanbymeteranaktif']);
    Route::post('/riwayattagihanbymeteran', [HomeController::class, 'riwayattagihanbymeteran']);

    Route::get('pemakaian/create/{meteran}', [PemakaianController::class, 'create']); // ok

    Route::get('/pemakaian', [PemakaianController::class, 'index']); // ok
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::get('/pembayaran/meteran/{id}', [PembayaranController::class, 'PembayaranByid']);

    Route::get('/tagihan', [TagihanController::class, 'index']);
});
