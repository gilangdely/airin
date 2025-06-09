<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemakaianController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'userProfile']);
    Route::post('/user', [UserController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Route::post('/change-password', [UpdateUserController::class, 'changePassword']);

    Route::get('pemakaian/create/{meteran}', [PemakaianController::class, 'create']);

    // di hapus controllernya man yang ada di folder API pindah ke COntroller default
    // Route::post('/pemakaian', [PemakaianController::class, 'store']);
    // Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::get('/pemakaian', [PemakaianController::class, 'index']);
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::get('/pembayaran/meteran/{id}', [PemakaianController::class, 'PembayaranByid']);


    Route::get('/tagihan', [TagihanController::class, 'index']);
});
