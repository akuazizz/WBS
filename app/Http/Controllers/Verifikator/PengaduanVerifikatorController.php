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
            'action' => 'required|in:terima,tolak,selesai', // Tambahkan 'selesai' di sini
            'catatan' => 'required_if:action,tolak|nullable|string|max:1000',
        ]);

        $action = $request->input('action');
        $catatan = $request->input('catatan');
        $namaVerifikator = Auth::user()->name;

        switch ($action) {
            case 'terima':
                $pengaduan->status = 'Diproses';
                $deskripsi = "Pengaduan diterima & diproses oleh Verifikator ({$namaVerifikator}).";
                break;
            case 'tolak':
                $pengaduan->status = 'Ditolak';
                $deskripsi = "Pengaduan ditolak oleh Verifikator ({$namaVerifikator}).";
                break;
            case 'selesai': // Tambahkan case ini
                $pengaduan->status = 'Selesai';
                $deskripsi = "Pengaduan dinyatakan selesai oleh Verifikator ({$namaVerifikator}).";
                break;
        }

        $pengaduan->save();

        $pengaduan->tindak_lanjuts()->create([
            'deskripsi' => $deskripsi,
            'catatan_administrator' => $catatan,
            'dibuat_oleh' => 'administrator', // Anda bisa ganti ini jadi 'verifikator' jika ingin membedakan
        ]);

        // Redirect kembali ke halaman detail verifikator agar bisa lihat perubahannya
        return redirect()->route('verifikator.pengaduan.show', $pengaduan)->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
