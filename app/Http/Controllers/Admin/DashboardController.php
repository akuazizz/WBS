<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    // Tambahkan Request $request sebagai parameter
    public function index(Request $request)
    {
        // STATISTIK (Tetap sama, selalu hitung semua)
        $totalBaru = Pengaduan::where('status', 'Baru')->count();
        $totalDiproses = Pengaduan::where('status', 'Diproses')->count();
        $totalSelesai = Pengaduan::where('status', 'Selesai')->count();
        $totalDitolak = Pengaduan::where('status', 'Ditolak')->count();
        $totalSemua = Pengaduan::count();

        // FILTERING UNTUK TABEL
        $query = Pengaduan::query(); // Mulai query builder

        $statusFilter = $request->query('status'); // Ambil 'status' dari URL, misal: ?status=Baru

        if ($statusFilter) {
            $query->where('status', $statusFilter);
            $judulTabel = 'Daftar Pengaduan dengan Status "' . $statusFilter . '"';
        } else {
            $judulTabel = 'Daftar Seluruh Pengaduan';
        }

        $semuaPengaduan = $query->latest()->paginate(10)->withQueryString(); // withQueryString() agar filter tetap ada saat ganti halaman

        // Kirim semua data, termasuk judul tabel dinamis
        return view('admin.dashboard', compact(
            'totalBaru',
            'totalDiproses',
            'totalSelesai',
            'totalDitolak',
            'totalSemua',
            'semuaPengaduan',
            'judulTabel', // <-- Kirim judul baru
            'statusFilter' // <-- Kirim status filter untuk menandai kartu yang aktif
        ));
    }
    public function activityLog()
    {
        $activities = Activity::with('causer', 'subject') // Eager load pelaku dan subjek
            ->latest()
            ->paginate(20);
        return view('admin.activity_log', compact('activities'));
    }
}
