<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TrackingController;

// --- Rute Publik (Bisa diakses tanpa login) ---
// Mengarahkan URL utama '/' ke method 'index' di dalam HomeController
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Profile
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Pengaduan
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Tracking
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/tracking', [TrackingController::class, 'search'])->name('tracking.search');

// Rute-rute yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

  // Dashboard setelah login
  Route::get('/dashboard', function () {
    return view('dashboard.home');
  })->name('dashboard');
});

// Memuat rute-rute untuk autentikasi (login, register, logout, dll.)
require __DIR__ . '/auth.php';
