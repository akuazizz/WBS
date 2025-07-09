<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('tindak_lanjuts');
        // Kita bisa "meminjam" view dari verifikator, tapi lebih baik buat sendiri
        // Untuk sementara, kita pinjam dulu
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function verifikasi(Request $request, Pengaduan $pengaduan)
    {
        // Validasi sama seperti verifikator
        $request->validate([
            'action' => 'required|in:terima,tolak,selesai', // Admin bisa langsung 'selesai'
            'catatan' => 'required_if:action,tolak|nullable|string|max:1000',
        ]);

        $action = $request->input('action');
        $catatan = $request->input('catatan');
        $namaAdmin = Auth::user()->name;

        switch ($action) {
            case 'terima':
                $pengaduan->status = 'Diproses';
                $deskripsi = "Pengaduan diterima & diproses oleh Admin ({$namaAdmin}).";
                break;
            case 'tolak':
                $pengaduan->status = 'Ditolak';
                $deskripsi = "Pengaduan ditolak oleh Admin ({$namaAdmin}).";
                break;
            case 'selesai':
                $pengaduan->status = 'Selesai';
                $deskripsi = "Pengaduan dinyatakan selesai oleh Admin ({$namaAdmin}).";
                break;
        }

        $pengaduan->save();

        $pengaduan->tindak_lanjuts()->create([
            'deskripsi' => $deskripsi,
            'catatan_administrator' => $catatan,
            'dibuat_oleh' => 'administrator',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
