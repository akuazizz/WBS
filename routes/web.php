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

  // Route untuk menampilkan halaman profil
  Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

  // Route untuk memproses update data
  Route::post('/profile/update-akun', [ProfileController::class, 'updateAkun'])->name('profile.update.akun');
  Route::post('/profile/update-pribadi', [ProfileController::class, 'updatePribadi'])->name('profile.update.pribadi');
  // Route untuk update foto profil bisa ditambahkan di sini nanti

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/pengaduan-saya', [PengaduanController::class, 'index'])->name('pengaduan.saya');

  // Route untuk menampilkan halaman detail pengaduan
  Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');

  // Route untuk menyimpan data dari form tindak lanjut
  Route::post('/pengaduan/{pengaduan}/tindak-lanjut', [PengaduanController::class, 'storeTindakLanjut'])->name('pengaduan.tindaklanjut.store');
});

// Memuat rute-rute untuk autentikasi (login, register, logout, dll.)
require __DIR__ . '/auth.php';
