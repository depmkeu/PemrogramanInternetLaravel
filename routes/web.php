<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard hanya bisa diakses user login dan verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route yang hanya bisa diakses oleh admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('programstudi', ProgramStudiController::class);
    Route::resource('fakultas', FakultasController::class);
});

// Route yang bisa diakses semua user login (user biasa atau admin)
Route::middleware('auth')->group(function () {
    // Profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar bisa dilihat user biasa
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('programstudi', [ProgramStudiController::class, 'index'])->name('programstudi.index');
    Route::get('fakultas', [FakultasController::class, 'index'])->name('fakultas.index');

    // Route AJAX: ambil program studi berdasarkan fakultas
    Route::get('/programstudi/fakultas/{fakultas_id}', [MahasiswaController::class, 'getProgramStudi'])->name('programstudi.byFakultas');

});

require __DIR__.'/auth.php';
