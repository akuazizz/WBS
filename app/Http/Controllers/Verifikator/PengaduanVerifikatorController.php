<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanVerifikatorController extends Controller
{
    /**
     * Menampilkan daftar semua pengaduan untuk verifikator.
     */
    public function index()
    {
        // Ambil semua pengaduan, urutkan dari yang terbaru.
        // Gunakan eager loading 'user' untuk menampilkan nama pelapor jika ada.
        $pengaduans = Pengaduan::with('user')->latest()->paginate(10);

        return view('verifikator.dashboard', compact('pengaduans'));
    }

    /**
     * Menampilkan detail satu pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        // Load relasi tindak lanjut untuk menampilkan riwayat
        $pengaduan->load('tindak_lanjuts');
        return view('verifikator.show', compact('pengaduan'));
    }

    /**
     * Memproses tindakan verifikasi (Terima atau Tolak).
     */
    public function verifikasi(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'action' => 'required|in:terima,tolak',
            // Catatan wajib diisi jika menolak
            'catatan' => 'required_if:action,tolak|nullable|string|max:1000',
        ]);

        $action = $request->input('action');
        $catatan = $request->input('catatan');
        $namaVerifikator = Auth::user()->name; // Ambil nama verifikator

        if ($action === 'terima') {
            $pengaduan->status = 'Diproses';
            $deskripsiTindakLanjut = "Pengaduan telah diverifikasi dan diterima oleh {$namaVerifikator}. Saat ini sedang dalam tahap proses.";
        } else { // action === 'tolak'
            $pengaduan->status = 'Ditolak';
            $deskripsiTindakLanjut = "Pengaduan ditolak oleh {$namaVerifikator}.";
        }

        $pengaduan->save();

        // Buat catatan tindak lanjut dari administrator/verifikator
        $pengaduan->tindak_lanjuts()->create([
            'deskripsi' => $deskripsiTindakLanjut,
            'catatan_administrator' => $catatan, // Simpan catatan verifikator
            'dibuat_oleh' => 'administrator',
        ]);

        return redirect()->route('verifikator.dashboard')->with('success', 'Pengaduan berhasil diverifikasi!');
    }
}
