<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PengaduanVerifikatorController extends Controller
{
    public function index(Request $request): View
    {
        $query = Pengaduan::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('kode_pengaduan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nama_terduga', 'like', '%' . $searchTerm . '%')
                    ->orWhere('uraian_pengaduan', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengaduans = $query->with('user')->latest()->paginate(10);

        $statuses = ['Baru', 'Diproses', 'Selesai', 'Ditolak'];

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

        $logMessage = "mengubah status pengaduan {$pengaduan->kode_pengaduan} menjadi '{$pengaduan->status}'";
        if ($request->filled('catatan')) {
            $logMessage .= " dengan catatan: " . $request->catatan;
        }
        activity()
            ->performedOn($pengaduan)
            ->causedBy(Auth::user())
            ->log($logMessage);

        return redirect()->route('verifikator.pengaduan.show', $pengaduan)->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
