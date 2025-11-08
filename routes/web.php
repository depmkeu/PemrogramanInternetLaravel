<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

// HALAMAN UTAMA
Route::get('/', function () {
    return view('welcome');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROUTE KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('programstudi', ProgramStudiController::class)->except(['show']);
    Route::resource('fakultas', FakultasController::class);
});

// ROUTE UNTUK SEMUA USER LOGIN (admin & user biasa)
Route::middleware(['auth'])->group(function () {
   // Hanya boleh lihat daftar mahasiswa dan detail
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

    // Lihat program studi (tanpa edit)
    Route::get('/programstudi', [ProgramStudiController::class, 'index'])->name('programstudi.index');

    // Lihat fakultas (tanpa edit)
    Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');

    // Profil sendiri
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dropdown dinamis
    Route::get('/programstudi/fakultas/{fakultas_id}', [MahasiswaController::class, 'getProgramStudi'])
        ->name('programstudi.byFakultas');
});

require __DIR__ . '/auth.php';
