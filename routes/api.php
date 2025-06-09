<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\PemakaianController;
use Illuminate\Http\Request;
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

    Route::get('/pemakaian', [App\Http\Controllers\PemakaianController::class, 'index']);

    // Route::get('/pemakaian', [PemakaianController::class, 'index']);
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
    Route::get('/pembayaran/meteran/{id}', [PemakaianController::class, 'PembayaranByid']);
});
