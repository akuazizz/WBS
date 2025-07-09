<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\UserController;

// Route utama dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Grup untuk route pengaduan
Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
  Route::get('/{pengaduan}', [PengaduanController::class, 'show'])->name('show');
  Route::post('/{pengaduan}/verifikasi', [PengaduanController::class, 'verifikasi'])->name('verifikasi');
});

// Route untuk manajemen user
Route::resource('users', UserController::class);
