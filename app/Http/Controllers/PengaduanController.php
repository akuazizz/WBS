<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {
        // Method ini akan memuat file view untuk form pengaduan
        return view('pengaduan.create');
    }
}
