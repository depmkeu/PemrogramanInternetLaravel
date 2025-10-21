<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaDummyController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProgramStudiController;

Route::get('/', function () {
    return view('home');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('fakultas', FakultasController::class);
Route::resource('programstudi', ProgramStudiController::class);

Route::get('/programstudi/fakultas/{fakultas_id}', [MahasiswaController::class, 'getProgramStudi']);

// VERSI TANPA DATABASE
Route::prefix('mahasiswa-dummy')->group(function () {
Route::get('/', [MahasiswaDummyController::class, 'index'])->name('mahasiswa-dummy.index');
Route::get('/create', [MahasiswaDummyController::class, 'create'])->name('mahasiswa-dummy.create');
Route::post('/', [MahasiswaDummyController::class, 'store'])->name('mahasiswa-dummy.store');
Route::get('/{id}/edit', [MahasiswaDummyController::class, 'edit'])->name('mahasiswa-dummy.edit');
Route::post('/{id}', [MahasiswaDummyController::class, 'update'])->name('mahasiswa-dummy.update');
});