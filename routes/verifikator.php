<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Verifikator\PengaduanVerifikatorController;

// Dashboard utama verifikator
Route::get('/dashboard', [PengaduanVerifikatorController::class, 'index'])->name('dashboard');

// Grup untuk route pengaduan
Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
  Route::get('/{pengaduan}', [PengaduanVerifikatorController::class, 'show'])->name('show');
  Route::post('/{pengaduan}/verifikasi', [PengaduanVerifikatorController::class, 'verifikasi'])->name('verifikasi');
});
