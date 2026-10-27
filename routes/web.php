<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

// ---------- Publik: warga mengirim laporan tanpa login ----------
Route::get('/lapor', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/lapor', [LaporanController::class, 'store'])->name('laporan.store');

// ---------- Authentication manual (hanya untuk yang belum login) ----------
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// ---------- Dilindungi middleware auth: khusus petugas ----------
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::delete('/laporan/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
});