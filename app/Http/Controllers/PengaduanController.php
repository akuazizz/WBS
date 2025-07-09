<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Mail\PengaduanDiterimaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Auth::user()->pengaduans()->latest()->get();
        return view('pengaduan.index', ['pengaduans' => $pengaduans]);
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $rules = [
            'nama_terduga' => 'required|string|max:255', 'jabatan_terduga' => 'nullable|string|max:255', 'unit_kerja' => 'required|string|max:255', 'uraian_pengaduan' => 'required|string|min:20', 'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
        $userId = null; $infoPelapor = ''; $emailPelapor = '';
        if (Auth::check()) {
            $user = Auth::user(); $userId = $user->id; $infoPelapor = $user->info_pelapor; $emailPelapor = $user->email;
        } else {
            $rules['jenis_pelapor'] = 'required|in:asn,umum'; $rules['email'] = 'required|email'; $infoPelapor = $request->input('jenis_pelapor'); $emailPelapor = $request->input('email');
        }
        $validatedData = $request->validate($rules);

        // Upload file
        $path_dokumen = null;
        if ($request->hasFile('dokumen')) {
            $path_dokumen = $request->file('dokumen')->store('dokumen_pengaduan', 'public');
        }

        try {
            $pengaduan = Pengaduan::create([
                'user_id' => $userId, 'kode_pengaduan' => 'BJR-' . date('Ymd') . '-' . Str::upper(Str::random(5)), 'nama_terduga' => $validatedData['nama_terduga'], 'jabatan_terduga' => $validatedData['jabatan_terduga'], 'unit_kerja' => $validatedData['unit_kerja'], 'uraian_pengaduan' => $validatedData['uraian_pengaduan'], 'dokumen_path' => $path_dokumen, 'info_pelapor' => $infoPelapor, 'email_pelapor' => $emailPelapor, 'status' => 'Baru',
            ]);

            if ($pengaduan) {
                $pengaduan->tindak_lanjuts()->create([
                    'deskripsi' => 'Pengaduan berhasil dibuat dan sedang menunggu proses verifikasi oleh Verifikator.',
                    'dibuat_oleh' => 'pelapor'
                ]);

                // === PERBAIKAN LOG MANUAL DI SINI ===
                activity()
                    ->performedOn($pengaduan)
                    ->causedBy(Auth::user()) // Menggunakan Auth::user() yang aman (akan null jika tamu)
                    ->log("membuat pengaduan baru dengan kode {$pengaduan->kode_pengaduan}");
                // =====================================
            }

            Mail::to($emailPelapor)->send(new PengaduanDiterimaMail($pengaduan));
            if (!Auth::check()) { session(['email_pengaduan_terakhir' => $emailPelapor]); }

            return response()->json([
                'success' => true, 'message' => 'Pengaduan berhasil dikirim! Kode tracking telah dikirim ke email Anda.', 'kode_pengaduan' => $pengaduan->kode_pengaduan
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan pengaduan: ' . $e->getMessage());
            return response()->json([
                'success' => false, 'message' => config('app.debug') ? $e->getMessage() : 'Terjadi kesalahan pada server. Silakan coba lagi.'
            ], 500);
        }
    }

    public function show(Pengaduan $pengaduan)
    {
        if (Auth::id() !== $pengaduan->user_id) {
            abort(403, 'ANDA TIDAK BERHAK MENGAKSES HALAMAN INI');
        }
        $pengaduan->load('tindak_lanjuts');
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function storeTindakLanjut(Request $request, Pengaduan $pengaduan)
    {
        // Pastikan user yang login adalah pemilik pengaduan ini
        if (Auth::id() !== $pengaduan->user_id) {
            abort(403);
        }

        $request->validate([
            'deskripsi' => 'required|string|min:10',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $path_lampiran = null;
        if ($request->hasFile('lampiran')) {
            $path_lampiran = $request->file('lampiran')->store('lampiran_tindak_lanjut', 'public');
        }

        $pengaduan->tindak_lanjuts()->create([
            'deskripsi' => $request->deskripsi,
            'lampiran_path' => $path_lampiran,
            'dibuat_oleh' => 'pelapor'
        ]);

        if ($pengaduan->status == 'Belum ditindaklanjuti Pelapor') {
            $pengaduan->update(['status' => 'Sedang ditindaklanjuti Pelapor']);
        }

        // === PERBAIKAN LOG MANUAL DI SINI JUGA ===
        activity()
            ->performedOn($pengaduan)
            ->causedBy(Auth::user()) // Menggunakan Auth::user()
            ->log("memberikan tindak lanjut pada pengaduan {$pengaduan->kode_pengaduan}");
        // =========================================

        return back()->with('success', 'Tindak lanjut berhasil dikirim!');
    }
}