<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\FakultasController;

Route::view('/', 'welcome')->name('home');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // READ ONLY (semua user login boleh akses)
    Route::resource('mahasiswa', MahasiswaController::class)
        ->only(['index', 'show'])
        ->where(['mahasiswa' => '[0-9]+']);

    Route::resource('fakultas', FakultasController::class)->only(['index']);
    Route::resource('programstudi', ProgramStudiController::class)->only(['index']);

    Route::get('programstudi/fakultas/{fakultas_id}', [MahasiswaController::class, 'getProgramStudi'])
        ->name('programstudi.byFakultas');
});

Route::middleware(['auth', 'admin'])->group(function () {

    // ADMIN CRUD
    Route::resource('mahasiswa', MahasiswaController::class)
        ->except(['index', 'show']);

    Route::resource('fakultas', FakultasController::class)
        ->except(['index', 'show']);

    Route::resource('programstudi', ProgramStudiController::class)
        ->except(['index', 'show']);
});
