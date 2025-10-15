<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaDummyController;

Route::get('/', function () {
    return view('home');
});

Route::resource('mahasiswa', MahasiswaController::class);

// VERSI TANPA DATABASE
Route::get('/mahasiswa-dummy', [MahasiswaDummyController::class, 'index']);     // list atau profil 
Route::get('/mahasiswa-dummy/create', [MahasiswaDummyController::class, 'create']); // form tambah 
Route::post('/mahasiswa-dummy', [MahasiswaDummyController::class, 'store']);    // proses simpan 
Route::get('/mahasiswa-dummy/{id}/edit', [MahasiswaDummyController::class, 'edit']); // form edit 
Route::post('/mahasiswa-dummy/{id}', [MahasiswaDummyController::class, 'update']);   // proses update 