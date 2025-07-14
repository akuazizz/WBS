<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'kode_pengaduan' => 'required|string|exists:pengaduans,kode_pengaduan'
        ], [
            'kode_pengaduan.exists' => 'Kode pengaduan yang Anda masukkan tidak ditemukan.'
        ]);

        $kode = $request->input('kode_pengaduan');

        $pengaduan = Pengaduan::where('kode_pengaduan', $kode)
            ->with('tindak_lanjuts')
            ->first();

        return view('tracking.index', [
            'pengaduan' => $pengaduan
        ]);
    }
}
