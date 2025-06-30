<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Cek Tracking Pengaduan - WBS Bappenas</title>

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body { 
                font-family: 'Inter', sans-serif;
                background-color: #e0f2fe; /* light sky blue */
            }
            .text-bappenas-title { color: #005a9e; }
            .bg-bappenas-button { background-color: #005a9e; }
            .hover\:bg-bappenas-button-hover:hover { background-color: #004b85; }
            .form-input-custom {
                background-color: #f0f9ff; /* sky-100 */
                border: 1px solid #d1d5db; /* gray-300 */
            }
            .form-input-custom:focus {
                border-color: #3b82f6; /* blue-500 */
                box-shadow: 0 0 0 1px #3b82f6;
            }
        </style>
        <!-- Google Fonts: Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">

        <div>
            <!-- Navigasi Atas -->
            <header class="py-4 bg-white shadow-sm">
                <div class="container mx-auto px-6 flex justify-between items-center">
                    <a href="{{ url('/') }}"><img src="https://wbs.bappenas.go.id/img/logo_wbs4.png" alt="Logo WBS Bappenas" class="h-8"></a>
                    <nav class="flex items-center space-x-6 text-bappenas-title font-semibold">
                        <a href="{{ url('/') }}" class="hover:underline">Menu Utama</a>
                        <a href="{{ route('pengaduan.create') }}" class="hover:underline">Buat Pengaduan</a>
                        <a href="{{ route('login') }}" class="px-5 py-2 text-sm bg-bappenas-button text-white rounded hover:bg-bappenas-button-hover flex items-center space-x-2 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            <span>Masuk</span>
                        </a>
                    </nav>
                </div>
            </header>
            
            <!-- Konten Form Tracking -->
            <main class="py-10">
                <div class="container mx-auto px-6 max-w-4xl">
                    <div class="text-center text-bappenas-title mb-8">
                        <h1 class="text-4xl font-extrabold">CEK TRACKING PENGADUAN</h1>
                        <p class="mt-2 text-lg">Memudahkan pengguna memantau status terkini, riwayat, dan perkembangan pengaduan yang telah diajukan.</p>
                    </div>

                    <!-- Form Pencarian -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Form Pengaduan</h3>
                        <form action="{{ route('tracking.search') }}" method="POST">
                            @csrf
                            <input type="text" name="kode_pengaduan" placeholder="Masukkan kode pengaduan untuk mengetahui status tracking pengaduan Anda." required class="form-input-custom block w-full rounded-md shadow-sm sm:text-lg p-4">
                            <button type="submit" class="mt-4 w-full sm:w-auto flex justify-center py-3 px-8 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-bappenas-button hover:bg-bappenas-button-hover">
                                Cari
                            </button>
                        </form>
                    </div>

                    <!-- Hasil Tracking (Tampil jika ada hasil) -->
                    @if(isset($trackingResult))
                        <div class="bg-white p-8 rounded-lg shadow-lg mt-8">
                            @if($trackingResult)
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Hasil Tracking Pengaduan dengan No. {{ $kodePengaduan }}</h3>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $trackingResult['tanggal'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $trackingResult['status'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                                    <h4 class="font-bold text-gray-700">Informasi</h4>
                                    <ol class="list-decimal list-inside text-sm text-gray-600 mt-2">
                                        <li>Tutorial untuk menindaklanjuti catatan bagi pelapor yang belum registrasi</li>
                                        <li>Tutorial untuk menindaklanjuti catatan bagi pelapor yang sudah registrasi</li>
                                    </ol>
                                </div>
                            @else
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Hasil Tracking Pengaduan</h3>
                                <p class="text-center text-gray-500 py-8">Kode pengaduan '{{ $kodePengaduan }}' tidak ditemukan.</p>
                            @endif
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </body>
    </html>