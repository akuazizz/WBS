<!DOCTYPE html>
<html lang="id">

<head>
    {{-- Head Anda sudah benar, tidak perlu diubah --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cek Tracking Pengaduan - WBS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #004b85;
        }

        .text-bappenas-title {
            color: #005a9e;
        }

        .bg-bappenas-button {
            background-color: #005a9e;
        }

        .hover\:bg-bappenas-button-hover:hover {
            background-color: #004b85;
        }

        .form-input-custom {
            background-color: #f0f9ff;
            border: 1px solid #d1d5db;
            height: 2.75rem;
            padding: 0.625rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
</head>

<body class="antialiased">
    <div>
        <!-- Header Navigasi (Sudah Benar) -->
        <header class="py-4 bg-white shadow-sm">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://inspektorat.banjarnegarakab.go.id/wp-content/uploads/2020/03/nama.png"
                        alt="Logo Inspektorat" class="h-8 mr-4">
                    <img src="{{ asset('images/berakhlak-bangga.png') }}" alt="Logo berAKHLAK" class="h-10">
                </div>
                <nav class="flex items-center space-x-6 text-bappenas-title font-semibold">
                    <a href="{{ url('/') }}" class="hover:underline">Menu Utama</a>
                    <a href="{{ route('pengaduan.create') }}" class="hover:underline">Buat Pengaduan</a>
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 text-sm bg-bappenas-button text-white rounded hover:bg-bappenas-button-hover flex items-center space-x-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>Masuk</span>
                    </a>
                </nav>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class="py-10">
            <div class="container mx-auto px-6 max-w-4xl space-y-8">
                {{-- Bagian Form Pencarian --}}
                <div>
                    <div class="text-center text-white mb-8">
                        <h1 class="text-4xl font-extrabold">CEK TRACKING PENGADUAN</h1>
                        <p class="mt-2 text-lg">Pantau status terkini dari pengaduan yang telah Anda ajukan.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <form action="{{ route('tracking.search') }}" method="POST">
                            @csrf
                            <label for="kode_pengaduan" class="block text-sm font-medium text-gray-700 mb-2">Masukkan
                                kode pengaduan Anda</label>
                            <input type="text" name="kode_pengaduan" id="kode_pengaduan"
                                value="{{ $pengaduan->kode_pengaduan ?? old('kode_pengaduan') }}" required
                                class="form-input-custom">
                            @error('kode_pengaduan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <button type="submit"
                                class="mt-4 w-full sm:w-auto flex justify-center py-3 px-8 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-bappenas-button hover:bg-bappenas-button-hover">
                                Cari
                            </button>
                        </form>
                    </div>
                </div>

                {{-- =============================================== --}}
                {{-- BLOK HASIL PENCARIAN (KONDISIONAL) --}}
                {{-- =============================================== --}}
                @if (isset($pengaduan))
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">
                            Hasil Tracking Pengaduan dengan No.{{ $pengaduan->kode_pengaduan }}
                        </h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-3 border text-left text-sm font-semibold text-gray-600">Tanggal</th>
                                        <th class="p-3 border text-left text-sm font-semibold text-gray-600">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pengaduan->tindak_lanjuts as $tindak_lanjut)
                                        <tr class="border-t">
                                            <td class="p-3 border align-top w-1/3">
                                                {{ $tindak_lanjut->created_at->translatedFormat('l, d F Y H:i') }} WIB
                                            </td>
                                            <td class="p-3 border align-top">
                                                {{ $tindak_lanjut->deskripsi }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border-t">
                                            <td colspan="2" class="p-3 text-center text-gray-500">
                                                Belum ada riwayat tracking untuk pengaduan ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                {{-- =============================================== --}}
                {{-- AKHIR BLOK HASIL PENCARIAN --}}
                {{-- =============================================== --}}
            </div>
        </main>
    </div>
</body>

</html>