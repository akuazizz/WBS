<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Mail\PengaduanDiterimaMail; // Pastikan nama Mail class Anda benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// Hapus Validator karena kita bisa pakai $request->validate() yang lebih simpel
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        // Ambil semua pengaduan yang 'user_id'-nya sama dengan ID user yang sedang login.
        // Gunakan relasi yang sudah kita buat. Urutkan dari yang terbaru.
        $pengaduans = Auth::user()->pengaduans()->latest()->get();

        // Kirim data pengaduan ke view
        return view('pengaduan.index', ['pengaduans' => $pengaduans]);
    }
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        // Validasi dasar yang berlaku untuk semua
        $rules = [
            'nama_terduga' => 'required|string|max:255',
            'jabatan_terduga' => 'nullable|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'uraian_pengaduan' => 'required|string|min:20',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];

        // Variabel untuk menampung data yang akan disimpan
        $userId = null;
        $infoPelapor = '';
        $emailPelapor = '';

        if (Auth::check()) {
            // --- KASUS 1: USER SUDAH LOGIN ---
            $user = Auth::user();
            $userId = $user->id;
            $infoPelapor = $user->info_pelapor; // Asumsi ada kolom 'info_pelapor' di tabel users
            $emailPelapor = $user->email;
        } else {
            // --- KASUS 2: USER ADALAH TAMU ---
            // Tambahkan validasi khusus untuk tamu
            $rules['jenis_pelapor'] = 'required|in:asn,umum';
            $rules['email'] = 'required|email';

            $infoPelapor = $request->input('jenis_pelapor');
            $emailPelapor = $request->input('email');
        }

        // Jalankan validasi
        $validatedData = $request->validate($rules);

        // Proses upload file (sama untuk keduanya)
        $path_dokumen = null;
        if ($request->hasFile('dokumen')) {
            $path_dokumen = $request->file('dokumen')->store('dokumen_pengaduan', 'public');
        }

        try {
            // Simpan data ke database
            $pengaduan = Pengaduan::create([
                'user_id' => $userId, // Akan berisi ID user atau null
                'kode_pengaduan' => 'BJR-' . date('Ymd') . '-' . Str::upper(Str::random(5)),
                'nama_terduga' => $validatedData['nama_terduga'],
                'jabatan_terduga' => $validatedData['jabatan_terduga'],
                'unit_kerja' => $validatedData['unit_kerja'],
                'uraian_pengaduan' => $validatedData['uraian_pengaduan'],
                'dokumen_path' => $path_dokumen,
                'info_pelapor' => $infoPelapor,
                'email_pelapor' => $emailPelapor,
                'status' => 'Baru',
            ]);

            if ($pengaduan) {
                $pengaduan->tindak_lanjuts()->create([
                    'deskripsi' => 'Pengaduan berhasil dibuat dan sedang menunggu proses verifikasi oleh Verifikator.',
                    'dibuat_oleh' => 'pelapor' // atau bisa juga 'sistem'
                ]);
            }

            // Kirim email
            Mail::to($emailPelapor)->send(new PengaduanDiterimaMail($pengaduan));

            // Setelah user tamu melapor, kita bisa coba hubungkan pengaduannya
            // jika dia kemudian register dengan email yang sama.
            if (!Auth::check()) {
                // Simpan email yang baru saja melapor ke session.
                // Nanti kita gunakan ini setelah dia register.
                session(['email_pengaduan_terakhir' => $emailPelapor]);
            }

            // return response()->json(...);

            return response()->json([
                'success' => true,
                'message' => 'Pengaduan berhasil dikirim! Kode tracking telah dikirim ke email Anda.',
                'kode_pengaduan' => $pengaduan->kode_pengaduan
            ]);
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan pengaduan: ' . $e->getMessage());

            // KEMBALIKAN RESPONS JSON UNTUK ERROR JUGA
            return response()->json([
                'success' => false,
                // Tampilkan pesan error asli jika sedang dalam mode development
                'message' => config('app.debug') ? $e->getMessage() : 'Terjadi kesalahan pada server. Silakan coba lagi.'
            ], 500); // 500 adalah kode status untuk Internal Server Error
        }
    }

    public function show(Pengaduan $pengaduan)
    {
        // Pastikan user yang login adalah pemilik pengaduan ini
        if (Auth::id() !== $pengaduan->user_id) {
            abort(403, 'ANDA TIDAK BERHAK MENGAKSES HALAMAN INI');
        }

        // Load relasi tindak_lanjuts agar tidak terjadi N+1 query problem
        $pengaduan->load('tindak_lanjuts');

        return view('pengaduan.show', ['pengaduan' => $pengaduan]);
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
            'dibuat_oleh' => 'pelapor' // Karena ini dari sisi pelapor
        ]);

        // Cek apakah admin meminta tindak lanjut, jika ya, ubah status
        if ($pengaduan->status == 'Belum ditindaklanjuti Pelapor') {
            $pengaduan->update(['status' => 'Sedang ditindaklanjuti Pelapor']);
        }

        return back()->with('success', 'Tindak lanjut berhasil dikirim!');
    }
}
