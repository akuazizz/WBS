<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalBaru = Pengaduan::where('status', 'Baru')->count();
        $totalDiproses = Pengaduan::where('status', 'Diproses')->count();
        $totalSelesai = Pengaduan::where('status', 'Selesai')->count();
        $totalDitolak = Pengaduan::where('status', 'Ditolak')->count();
        $totalSemua = Pengaduan::count();

        $query = Pengaduan::query(); 

        $statusFilter = $request->query('status'); 

        if ($statusFilter) {
            $query->where('status', $statusFilter);
            $judulTabel = 'Daftar Pengaduan dengan Status "' . $statusFilter . '"';
        } else {
            $judulTabel = 'Daftar Seluruh Pengaduan';
        }

        $semuaPengaduan = $query->latest()->paginate(10)->withQueryString(); 

        return view('admin.dashboard', compact(
            'totalBaru',
            'totalDiproses',
            'totalSelesai',
            'totalDitolak',
            'totalSemua',
            'semuaPengaduan',
            'judulTabel', //
            'statusFilter' //
        ));
    }
    public function activityLog()
    {
        $activities = Activity::with('causer', 'subject')
            ->latest()
            ->paginate(20);
        return view('admin.activity_log', compact('activities'));
    }
}
