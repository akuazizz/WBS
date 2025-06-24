<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Nanti kita bisa menambahkan logika lain di sini jika perlu
        return view('dashboard'); // Mengembalikan view 'welcome' sebagai halaman dashboard
    }
}