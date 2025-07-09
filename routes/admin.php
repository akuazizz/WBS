<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Semua route di sini sudah otomatis memiliki prefix 'admin/' dan nama 'admin.'
| karena konfigurasi di bootstrap/app.php.
|
*/

// Route utama dashboard admin
// URL: /admin/dashboard
// Nama: admin.dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk manajemen pengaduan menggunakan resource controller.
// Ini akan secara otomatis membuat route untuk:
// - admin.pengaduan.index   (GET /admin/pengaduan)
// - admin.pengaduan.show    (GET /admin/pengaduan/{pengaduan})
// - admin.pengaduan.edit    (GET /admin/pengaduan/{pengaduan}/edit)
// - admin.pengaduan.update  (PUT/PATCH /admin/pengaduan/{pengaduan})
// - admin.pengaduan.destroy (DELETE /admin/pengaduan/{pengaduan})
Route::resource('pengaduan', PengaduanController::class)->except(['create', 'store']);

// Route khusus untuk verifikasi yang tidak termasuk dalam standar resource.
// URL: /admin/pengaduan/{pengaduan}/verifikasi
// Nama: admin.pengaduan.verifikasi
Route::post('pengaduan/{pengaduan}/verifikasi', [PengaduanController::class, 'verifikasi'])->name('pengaduan.verifikasi');

// Route untuk manajemen user
// URL: /admin/users, /admin/users/{user}, etc.
// Nama: admin.users.index, admin.users.show, etc.
Route::resource('users', UserController::class);

// Route untuk log aktivitas
// URL: /admin/activity-log
// Nama: admin.activity.log
Route::get('activity-log', [DashboardController::class, 'activityLog'])->name('activity.log');
