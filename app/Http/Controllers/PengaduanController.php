<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }
    public function store(Request $request)
    {
        // Logika untuk menyimpan data akan ditambahkan nanti
        return "Data pengaduan diterima!"; // Respon sementara
    }
}