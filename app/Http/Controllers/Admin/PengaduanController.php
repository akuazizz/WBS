<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // ... (method index dan show tetap sama) ...
    public function index(Request $request)
    {
        $query = Pengaduan::with('user')->latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_pengaduan', 'like', "%{$search}%")->orWhere('nama_terduga', 'like', "%{$search}%")->orWhere('uraian_pengaduan', 'like', "%{$search}%")->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                });
            });
        }
        $pengaduans = $query->paginate(15)->withQueryString();
        return view('admin.pengaduan.index', ['pengaduans' => $pengaduans, 'statuses' => ['Baru', 'Diproses', 'Selesai', 'Ditolak'],]);
    }
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('tindak_lanjuts');
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function verifikasi(Request $request, Pengaduan $pengaduan)
    {
        $request->validate(['action' => 'required|in:terima,tolak,selesai', 'catatan' => 'required_if:action,tolak|nullable|string|max:1000',]);
        $action = $request->input('action');
        $catatan = $request->input('catatan');
        $namaAdmin = Auth::user()->name;
        $deskripsi = '';

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

        return redirect()->route('admin.dashboard')->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
