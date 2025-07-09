<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route; // Pastikan use Route ada jika belum

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        // 'then' adalah cara yang benar untuk menambahkan route kustom
        then: function () {
            Route::middleware(['web', 'auth', 'verifikator'])
                ->prefix('verifikator')
                ->as('verifikator.') // 'as' adalah pengganti 'name'
                ->group(base_path('routes/verifikator.php'));

            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin')
                ->as('admin.')
                ->group(base_path('routes/admin.php'));
        },
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // --- INI PERBAIKANNYA ---
        $middleware->alias([
            'verifikator' => \App\Http\Middleware\IsVerifikator::class,
            'admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
