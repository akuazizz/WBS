<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PengaduanVerifikatorController extends Controller
{
    // ... (method index dan show tetap sama) ...
    public function index(Request $request): View
    {
        $query = Pengaduan::query();

        // Logika untuk mencari berdasarkan keyword
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('kode_pengaduan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nama_terduga', 'like', '%' . $searchTerm . '%')
                    ->orWhere('uraian_pengaduan', 'like', '%' . $searchTerm . '%');
            });
        }

        // Logika untuk filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ambil data, urutkan dari yang terbaru, lalu paginasi
        $pengaduans = $query->with('user')->latest()->paginate(10);

        // Siapkan daftar status untuk dropdown filter di view
        $statuses = ['Baru', 'Diproses', 'Selesai', 'Ditolak'];

        // Kirim semua data yang diperlukan ke view
        return view('verifikator.dashboard', [
            'pengaduans' => $pengaduans,
            'statuses' => $statuses
        ]);
    }
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('tindak_lanjuts');
        return view('verifikator.show', compact('pengaduan'));
    }

    public function verifikasi(Request $request, Pengaduan $pengaduan)
    {
        $request->validate(['action' => 'required|in:terima,tolak,selesai', 'catatan' => 'required_if:action,tolak|nullable|string|max:1000',]);
        $action = $request->input('action');
        $catatan = $request->input('catatan');
        $namaVerifikator = Auth::user()->name;
        $deskripsi = '';

        switch ($action) {
            case 'terima':
                $pengaduan->status = 'Diproses';
                $deskripsi = "Pengaduan diterima & diproses oleh Verifikator ({$namaVerifikator}).";
                break;
            case 'tolak':
                $pengaduan->status = 'Ditolak';
                $deskripsi = "Pengaduan ditolak oleh Verifikator ({$namaVerifikator}).";
                break;
            case 'selesai':
                $pengaduan->status = 'Selesai';
                $deskripsi = "Pengaduan dinyatakan selesai oleh Verifikator ({$namaVerifikator}).";
                break;
        }

        $pengaduan->save();
        $pengaduan->tindak_lanjuts()->create(['deskripsi' => $deskripsi, 'catatan_administrator' => $catatan, 'dibuat_oleh' => 'administrator',]);

        // === TAMBAHKAN LOG MANUAL INI ===
        $logMessage = "mengubah status pengaduan {$pengaduan->kode_pengaduan} menjadi '{$pengaduan->status}'";
        if ($request->filled('catatan')) {
            $logMessage .= " dengan catatan: " . $request->catatan;
        }
        activity()
            ->performedOn($pengaduan)
            ->causedBy(Auth::user())
            ->log($logMessage);
        // ================================

        return redirect()->route('verifikator.pengaduan.show', $pengaduan)->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}