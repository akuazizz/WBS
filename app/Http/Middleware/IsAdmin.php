<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user login DAN memiliki role 'admin'
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        // Jika tidak, larang akses
        abort(403, 'Hanya Administrator yang Boleh Mengakses Halaman Ini.');
    }
}
