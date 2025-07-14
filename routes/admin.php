<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\UserController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pengaduan', PengaduanController::class)->except(['create', 'store']);

Route::post('pengaduan/{pengaduan}/verifikasi', [PengaduanController::class, 'verifikasi'])->name('pengaduan.verifikasi');

Route::resource('users', UserController::class);

Route::get('activity-log', [DashboardController::class, 'activityLog'])->name('activity.log');
