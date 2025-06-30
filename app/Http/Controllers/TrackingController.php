<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class TrackingController extends Controller
    {
        /**
         * Display the tracking page.
         */
        public function index(Request $request)
        {
            // Cek apakah ada hasil pencarian dari request
            $trackingResult = $request->session()->get('trackingResult', null);
            $kodePengaduan = $request->session()->get('kodePengaduan', null);
    
            return view('tracking.index', [
                'trackingResult' => $trackingResult,
                'kodePengaduan' => $kodePengaduan
            ]);
        }

        /**
         * Search for a complaint status.
         */
        public function search(Request $request)
        {
            $request->validate([
                'kode_pengaduan' => 'required|string|max:20',
            ]);

            $kode = $request->input('kode_pengaduan');

            // --- LOGIKA PENCARIAN ---
            // Nanti, Anda akan mencari data di database berdasarkan $kode.
            // Untuk sekarang, kita akan menggunakan data palsu (dummy data).
            $dummyData = [
                'PNG0081319' => [
                    'tanggal' => 'Senin, 23 Juni 2025',
                    'status' => 'Pengaduan Berhasil dibuat, Menunggu Verifikasi oleh Verifikator'
                ]
            ];

            $result = $dummyData[$kode] ?? null;

            // Simpan hasil ke session dan redirect kembali ke halaman index
            return redirect()->route('tracking.index')
                             ->with('trackingResult', $result)
                             ->with('kodePengaduan', $kode);
        }
    }