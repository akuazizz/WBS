<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cek Tracking Pengaduan - WBS Bappenas</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ---------- Global ---------- */
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

        /* ---------- Form Controls ---------- */
        .form-input-custom,
        input[type="text"],
        input[type="email"],
        select,
        textarea,
        input[readonly] {
            background-color: #f0f9ff;
            border: 1px solid #d1d5db;
            height: 2.75rem;
            padding: 0.625rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            height: auto;
            min-height: 8rem;
        }

        input[type="radio"]:checked {
            background-color: #005a9e;
            border-color: #005a9e;
        }

        /* ---------- KHUSUS input[type=file] ---------- */
        input[type="file"] {
            background-color: transparent;
            border: none;
            padding: 0;
            height: auto;
            width: auto;
            box-shadow: none;
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
                <div class="text-center text-white mb-8">
                    <h1 class="text-4xl font-extrabold">CEK TRACKING PENGADUAN</h1>
                    <p class="mt-2 text-lg">Memudahkan pengguna memantau status terkini, riwayat, dan perkembangan pengaduan yang telah diajukan.</p>
                </div>

                <!-- Form Pencarian -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Form Pengaduan</h3>
                    <form action="#" method="POST">
                        <input type="text" name="kode_pengaduan" placeholder="Masukkan kode pengaduan untuk mengetahui status tracking pengaduan Anda." required class="form-input-custom">
                        <button type="submit" class="mt-4 w-full sm:w-auto flex justify-center py-3 px-8 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-bappenas-button hover:bg-bappenas-button-hover">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
