<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==================1==================
// Tambahkan route GET ke /profil yang memanggil method index() dari MahasiswaController
route::get('/profil', [MahasiswaController::class, 'index'])->name('profil');