<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kirim Pengaduan - WBS Bappenas</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js CDN (untuk Pop-up) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-bappenas-blue { background-color: #0892D0; }
        .text-bappenas-darkblue { color: #005a9e; }
        input[type="radio"]:checked { background-color: #005a9e; }
    </style>
</head>
<body class="antialiased bg-bappenas-blue">

    <!-- Wrapper Utama dengan Alpine.js untuk Modal -->
    <div x-data="{ showModal: true }">

        <!-- Navigasi Atas -->
        <header class="py-4">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <a href="{{ url('/') }}"><img src="https://wbs.bappenas.go.id/img/logo_wbs4.png" alt="Logo WBS Bappenas" class="h-8"></a>
                <nav class="flex items-center space-x-6 text-white font-semibold">
                    <a href="{{ url('/') }}" class="hover:underline">Menu Utama</a>
                    <a href="#" class="hover:underline">Cek Tracking</a>
                    <a href="{{ route('dashboard') }}" class="px-5 py-2 text-sm bg-[#005a9e] rounded hover:bg-[#004b85] flex items-center space-x-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Dashboard</span>
                    </a>
                </nav>
            </div>
        </header>
        
        <!-- Konten Form Pengaduan -->
        <main class="py-10">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="text-center text-white mb-8">
                    <h1 class="text-4xl font-extrabold">KIRIM PENGADUAN</h1>
                    <p class="mt-2 text-lg opacity-90">Mari bersama-sama menciptakan pemerintahan yang jujur dan bersih, laporkan setiap pelanggaran yang terjadi di lingkungan kerja Anda.</p>
                </div>

                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-2xl space-y-6">
                    @csrf
                    <h3 class="text-xl font-bold text-gray-800 border-b pb-4">Form Pengaduan</h3>

                    <div>
                        <label for="kode_pengaduan" class="block text-sm font-medium text-gray-700">Kode Pengaduan</label>
                        <input type="text" id="kode_pengaduan" value="PNG0166193" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Kode pengaduan dibuat secara otomatis oleh sistem dan tidak bisa diubah.</p>
                    </div>

                    <div>
                        <label for="nama_terduga" class="block text-sm font-medium text-gray-700">Nama Terduga</label>
                        <input type="text" name="nama_terduga" id="nama_terduga" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Nama terduga adalah nama pegawai Bappenas yang terlibat.</p>
                    </div>

                    <div>
                        <label for="unit_kerja" class="block text-sm font-medium text-gray-700">Unit Kerja</label>
                        <select name="unit_kerja" id="unit_kerja" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Silahkan Pilih Unit Kerja</option>
                            <option>Deputi Bidang Ekonomi</option>
                            <option>Inspektorat Utama</option>
                            <option>Lain-lain</option>
                        </select>
                    </div>

                    <div>
                        <label for="uraian_pengaduan" class="block text-sm font-medium text-gray-700">Uraian Pengaduan</label>
                        <textarea name="uraian_pengaduan" id="uraian_pengaduan" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        <p class="mt-1 text-xs text-gray-500">Uraian pengaduan harus memenuhi unsur 4W 1H.</p>
                    </div>

                    <div>
                        <label for="dokumen" class="block text-sm font-medium text-gray-700">Dokumen Pendukung</label>
                        <input type="file" name="dokumen" id="dokumen" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <button type="button" class="mt-2 text-sm text-bappenas-darkblue font-semibold hover:underline">Tambahkan Dokumen Pendukung</button>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Informasi Pelapor</label>
                        <div class="mt-2 space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="info_pelapor" value="bappenas" checked class="form-radio text-indigo-600">
                                <span class="ml-2">Bappenas</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="info_pelapor" value="non-bappenas" class="form-radio text-indigo-600">
                                <span class="ml-2">Non-Bappenas</span>
                            </label>
                        </div>
                    </div>
                     <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Masukkan alamat email anda yang valid untuk keperluan komunikasi lebih lanjut.</p>
                    </div>
                    
                    <div class="pt-5">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#005a9e] hover:bg-[#004b85] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Buat Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </main>
        
        <!-- Pop-up Modal Jaminan Kerahasiaan -->
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" @click.self="showModal = false" style="display: none;">
            <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full" @click.away="showModal = false">
                <!-- Modal Header -->
                <div class="p-4 flex justify-between items-center border-b">
                    <div class="flex items-center">
                        <img src="https://wbs.bappenas.go.id/img/logo_wbs4.png" alt="Logo WBS" class="h-8 mr-4">
                        <img src="https://wbs.bappenas.go.id/img/header_logo_IU1.png" alt="Logo Inspektorat" class="h-10">
                    </div>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="p-8">
                    <div class="text-center mb-6">
                        <div class="mx-auto bg-red-100 rounded-full h-16 w-16 flex items-center justify-center">
                            <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mt-4">Data Pelapor Terjamin Karena Dilindungi Undang Undang</h2>
                        <p class="text-sm text-gray-500 mt-1">Data pelapor pada Whistleblowing System dilindungi oleh Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi.</p>
                    </div>
                    
                    <div class="bg-red-50 p-4 rounded-lg text-sm text-red-800">
                         <p class="font-bold">Kementerian PPN/Bappenas akan merahasiakan identitas pribadi Anda, perhatikan hal-hal berikut:</p>
                         <ul class="list-disc list-inside mt-2 space-y-1">
                             <li>Jika ingin identitas Anda tetap rahasia, jangan memberitahukan/mengisikan data-data pribadi.</li>
                             <li>Jangan memberitahukan/mengisikan data-data/informasi yang memungkinkan bagi orang lain untuk melacak siapa Anda.</li>
                             <li>Hindari orang lain mengetahui nama samaran (username) dan kata sandi (password) Anda.</li>
                         </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>