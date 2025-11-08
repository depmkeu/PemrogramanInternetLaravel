<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaApiController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('mahasiswa', MahasiswaApiController::class)->names([
    'store' => 'api.mahasiswa.store',
    'update' => 'api.mahasiswa.update',
    'index' => 'api.mahasiswa.index',
    'destroy' => 'api.mahasiswa.destroy',
]);
});
