<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PemakaianController;
use App\Http\Controllers\API\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', [UsersController::class, 'index']);
    Route::post('/user', [UsersController::class, 'store']);
    Route::put('/user}', [UsersController::class, 'update']);

    Route::get('/pemakaian', [PemakaianController::class, 'index']);
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);
});

