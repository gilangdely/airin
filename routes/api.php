<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\API\UpdateUserController;
use App\Http\Controllers\MeteranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/me', [UpdateUserController::class, 'updateProfile']);
    Route::post('/change-password', [UpdateUserController::class, 'changePassword']);

    Route::get('pemakaian/create/{meteran}', [PemakaianController::class, 'create']);

    // di hapus controllernya man yang ada di folder API pindah ke COntroller default
    Route::get('/pemakaian', [App\Http\Controllers\API\PemakaianController::class, 'index']);
    // Route::post('/pemakaian', [PemakaianController::class, 'store']);
    // Route::put('/pemakaian', [PemakaianController::class, 'update']);
});
