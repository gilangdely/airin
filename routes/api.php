<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\PemakaianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/pemakaian', [PemakaianController::class, 'index']);
    Route::post('/pemakaian', [PemakaianController::class, 'store']);
    Route::put('/pemakaian', [PemakaianController::class, 'update']);

    Route::get('/getunpaidinvoice', [HomeController::class, 'getunpaidinvoice']);
    Route::post('/getmeteranbypelanggan', [HomeController::class, 'getmeteranbypelanggan']);
    Route::get('/gettagihanbymeteranaktif', [HomeController::class, 'gettagihanbymeteranaktif']);
});
