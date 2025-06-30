<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS Bappenas</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN (Penting untuk fungsionalitas TABS dan Accordion) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-bappenas-blue {
            background-color: #0892D0;
        }

        .bg-bappenas-darkblue {
            background-color: #005a9e;
        }

        .text-bappenas-darkblue {
            color: #005a9e;
        }

        .hover\:bg-bappenas-darkerblue:hover {
            background-color: #004b85;
        }
    </style>
</head>

<body class="antialiased bg-gray-50">
    <!-- Wrapper Utama dengan Alpine.js untuk Scroll to Top -->
    <div x-data="{ showScrollTop: false }" @scroll.window="showScrollTop = (window.pageYOffset > 300) ? true : false"
        class="flex flex-col min-h-screen">

        <div class="flex flex-col min-h-screen">

            <!-- [BAGIAN 1] TOP LOGO BAR -->
            <div class="bg-white py-2 border-b border-gray-200">
                <div class="container mx-auto px-6 flex justify-center items-center space-x-4">
                    <img src="https://wbs.bappenas.go.id/img/header_logo_IU1.png" alt="Logo Inspektorat Utama"
                        class="h-10 md:h-12">
                    <img src="https://wbs.bappenas.go.id/img/header_berakhlak.png" alt="Logo Berakhlak"
                        class="h-10 md:h-12">
                    <img src="https://wbs.bappenas.go.id/img/header_bangga.png" alt="Logo Bangga Melayani Bangsa"
                        class="h-10 md:h-12">
                </div>
            </div>

            <!-- [BAGIAN 2] NAVBAR DAN HERO SECTION -->
            <main class="flex-grow bg-bappenas-blue">
                <div class="container mx-auto px-6">
                    <!-- NAVBAR -->
                    <header class="py-4 flex justify-between items-center">
                        <a href="#"><img src="https://wbs.bappenas.go.id/img/logo_wbs4.png" alt="Logo WBS Bappenas"
                                class="h-8"></a>
                        <div class="hidden md:flex items-center space-x-8">
                            <nav class="flex items-center space-x-6 text-white font-semibold">
                                <a href="#beranda" class="hover:underline">Beranda</a>
                                <a href="#alur" class="hover:underline">Alur</a>
                                <a href="#unsur" class="hover:underline">Unsur</a>
                                <a href="#kerahasiaan" class="hover:underline">Kerahasiaan Pelapor</a>
                                <a href="#cara-melapor" class="hover:underline">Cara Melapor</a>
                                <a href="#faq" class="hover:underline">FAQ</a>
                                <a href="#kontak" class="hover:underline">Kontak Kami</a>
                            </nav>
                            <div>
                                <a href="#"
                                    class="px-5 py-2 text-sm bg-bappenas-darkblue text-white font-semibold rounded hover:bg-bappenas-darkerblue flex items-center space-x-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>Masuk</span>
                                </a>
                            </div>
                        </div>
                    </header>

                    <!-- HERO SECTION -->
                    <div class="pt-12 pb-24 text-white">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="w-full md:w-1/2 text-center md:text-left">
                                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-4">Selamat Datang di
                                    Aplikasi Whistleblowing System Bappenas</h1>
                                <p class="mb-8 text-lg opacity-90">Mari bersama-sama menciptakan pemerintahan yang jujur
                                    dan
                                    bersih, laporkan setiap pelanggaran yang terjadi di lingkungan kerja Anda.</p>
                                <div
                                    class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                                    <a href="{{ route('pengaduan.create') }}"
                                        class="px-8 py-3 bg-bappenas-darkblue font-bold rounded-md hover:bg-bappenas-darkerblue transition-colors text-center shadow-lg">Buat
                                        Pengaduan</a>
                                    <a href="{{ route('tracking.index') }}"
                                        class="px-8 py-3 border-2 border-white font-bold rounded-md hover:bg-white hover:text-blue-700 transition-colors text-center shadow-lg">Cek
                                        Tracking Pengaduan</a>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 mt-12 md:mt-0 flex justify-center">
                                <img src="https://wbs.bappenas.go.id/img/logo_wbs3.png" alt="Logo WBS Graphic"
                                    class="max-w-xs md:max-w-sm lg:max-w-md h-auto drop-shadow-2xl">
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- [BAGIAN 3] ALUR PENGADUAN SECTION -->
            <section id="alur" class="py-20 bg-gray-50">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Alur
                            Pengaduan
                        </h2>
                        <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Rangkaian tahapan sistematis yang
                            dilalui
                            dalam menangani dan menyelesaikan Pengaduan yang diajukan oleh Pelapor</p>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-12">
                        <a href="https://youtu.be/3QyQrLMMbMw?feature=shared" target="_blank"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 rounded-lg shadow-sm text-gray-700 font-semibold hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            Video Tutorial Panduan WBS
                        </a>
                        <a href="/img/Buku_Panduan_WBS_2024_Pelapor.pdf" target="_blank"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 rounded-lg shadow-sm text-gray-700 font-semibold hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            Buku Panduan Pelapor
                        </a>
                    </div>
                    <div x-data="{ activeTab: 'singkat' }" class="max-w-5xl mx-auto">
                        <div class="flex justify-center p-1 bg-gray-200 rounded-xl max-w-sm mx-auto">
                            <button @click="activeTab = 'singkat'"
                                :class="{ 'bg-gray-200 text-gray-700': activeTab !== 'singkat', 'bg-white text-bappenas-darkblue shadow': activeTab === 'singkat' }"
                                class="w-1/2 py-2 px-4 rounded-lg font-semibold transition-colors duration-300">Alur
                                Singkat</button>
                            <button @click="activeTab = 'detail'"
                                :class="{ 'bg-gray-200 text-gray-700': activeTab !== 'detail', 'bg-bappenas-darkblue text-white shadow': activeTab === 'detail' }"
                                class="w-1/2 py-2 px-4 rounded-lg font-semibold transition-colors duration-300">Alur
                                Detail</button>
                        </div>
                        <div class="mt-8 relative">
                            <div x-show="activeTab === 'singkat'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                <img src="{{ asset('images/alur-singkat.png') }}" alt="Diagram Alur Pengaduan Singkat"
                                    class="rounded-lg shadow-xl mx-auto">
                            </div>
                            <div x-show="activeTab === 'detail'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                style="display: none;">
                                <img src="https://wbs.bappenas.go.id/img/alur_WBS_fix.png"
                                    alt="Diagram Alur Pengaduan Detail" class="rounded-lg shadow-xl mx-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- [BAGIAN 4] UNSUR PENGADUAN SECTION -->
            <section id="unsur" class="py-20 bg-white">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Unsur
                            Pengaduan
                        </h2>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-12">
                        <div class="w-full md:w-1/2" x-data="{ openAccordion: 1 }">
                            <p class="text-lg text-gray-600 mb-6">Pengaduan Anda akan mudah ditindaklanjuti apabila
                                memenuhi
                                unsur sebagai berikut:</p>
                            <div class="space-y-4">
                                <div class="border rounded-lg overflow-hidden">
                                    <button @click="openAccordion = openAccordion === 1 ? null : 1"
                                        class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                        <span class="text-lg font-semibold text-gray-800">1. What</span>
                                        <svg class="w-6 h-6 transform transition-transform"
                                            :class="{ 'rotate-180': openAccordion === 1 }" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="openAccordion === 1" x-collapse>
                                        <div class="p-5 border-t">
                                            <p class="text-gray-600">Perbuatan berindikasi pelanggaran yang diketahui
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg overflow-hidden">
                                    <button @click="openAccordion = openAccordion === 2 ? null : 2"
                                        class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                        <span class="text-lg font-semibold text-gray-800">2. Where</span>
                                        <svg class="w-6 h-6 transform transition-transform"
                                            :class="{ 'rotate-180': openAccordion === 2 }" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="openAccordion === 2" x-collapse>
                                        <div class="p-5 border-t">
                                            <p class="text-gray-600">Dimana perbuatan tersebut dilakukan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg overflow-hidden">
                                    <button @click="openAccordion = openAccordion === 3 ? null : 3"
                                        class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                        <span class="text-lg font-semibold text-gray-800">3. When</span>
                                        <svg class="w-6 h-6 transform transition-transform"
                                            :class="{ 'rotate-180': openAccordion === 3 }" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="openAccordion === 3" x-collapse>
                                        <div class="p-5 border-t">
                                            <p class="text-gray-600">Kapan perbuatan tersebut dilakukan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg overflow-hidden">
                                    <button @click="openAccordion = openAccordion === 4 ? null : 4"
                                        class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                        <span class="text-lg font-semibold text-gray-800">4. Who</span>
                                        <svg class="w-6 h-6 transform transition-transform"
                                            :class="{ 'rotate-180': openAccordion === 4 }" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="openAccordion === 4" x-collapse>
                                        <div class="p-5 border-t">
                                            <p class="text-gray-600">Siapa saja yang terlibat dalam perbuatan tersebut
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border rounded-lg overflow-hidden">
                                    <button @click="openAccordion = openAccordion === 5 ? null : 5"
                                        class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                        <span class="text-lg font-semibold text-gray-800">5. How</span>
                                        <svg class="w-6 h-6 transform transition-transform"
                                            :class="{ 'rotate-180': openAccordion === 5 }" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="openAccordion === 5" x-collapse>
                                        <div class="p-5 border-t">
                                            <p class="text-gray-600">Bagaimana perbuatan tersebut dilakukan (modus,
                                                cara,
                                                dsb.)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-center">
                            <img src="{{ asset('images/unsur-pengaduan.png') }}" alt="Diagram Unsur Pengaduan"
                                class="max-w-md w-full h-auto rounded-lg shadow-xl">
                        </div>
                    </div>
                </div>
            </section>

            <!-- [BAGIAN 5] KERAHASIAAN PELAPOR SECTION (DARI SEBELUMNYA) -->
            <section id="kerahasiaan" class="py-20 bg-gray-50">
                <div class="container mx-auto px-6">
                    <!-- Judul Section -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Kerahasiaan
                            Pelapor</h2>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-center gap-12">
                        <!-- Kolom Kiri: Gambar Ilustrasi -->
                        <div class="w-full md:w-5/12">
                            <img src="https://wbs.bappenas.go.id/img/rahasia1.png" alt="Ilustrasi Kerahasiaan Data"
                                class="w-full h-auto">
                        </div>

                        <!-- Kolom Kanan: Teks Penjelasan (WARNA DIPERBAIKI) -->
                        <div class="w-full md:w-6/12">
                            <h3 class="text-xl font-bold text-bappenas-darkblue mb-4 leading-relaxed">
                                Kementerian PPN/Bappenas akan merahasiakan identitas pribadi Anda sebagai whistleblower
                                karena Kementerian PPN/Bappenas hanya fokus pada informasi yang Anda laporkan. Agar
                                Kerahasiaan lebih terjaga, perhatikan hal-hal berikut ini:
                            </h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-gray-800">Jika ingin identitas Anda tetap rahasia, jangan
                                        memberitahukan/mengisikan data-data pribadi, seperti nama Anda, atau hubungan
                                        Anda
                                        dengan pelaku-pelaku.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-gray-800">Jangan memberitahukan/mengisikan data-data/informasi
                                        yang
                                        memungkinkan bagi orang lain untuk melakukan pelacakan siapa Anda.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-gray-800">Hindari orang lain mengetahui nama samaran (username),
                                        kata
                                        sandi (password) serta nomor registrasi Anda.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- [BAGIAN 6] CARA MELAPOR SECTION (BARU) -->
            <section id="cara-melapor" class="py-20 bg-white">
                <div class="container mx-auto px-6">
                    <!-- Judul Section dengan garis bawah -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Cara Melapor
                        </h2>
                        <div class="mt-2 w-24 h-1 bg-bappenas-darkblue mx-auto"></div>
                    </div>

                    <div class="max-w-4xl mx-auto">
                        <!-- Daftar Langkah-langkah dengan gaya custom -->
                        <div class="space-y-4 text-gray-700 text-lg leading-relaxed">
                            <div class="flex">
                                <span class="mr-3">1.</span>
                                <p>Klik Tombol “BUAT PENGADUAN" untuk merekam pengaduan baru.</p>
                            </div>
                            <div class="flex">
                                <span class="mr-3">2.</span>
                                <p>Isi form pengaduan sesuai informasi yang anda ketahui.</p>
                            </div>
                            <div class="flex">
                                <span class="mr-3">3.</span>
                                <div>
                                    <p>Perhatikan baik-baik beberapa hal di bawah ini:</p>
                                    <div class="mt-2 ml-6 text-gray-600 space-y-2">
                                        <div class="flex">
                                            <span class="mr-2">a.</span>
                                            <p>Semua kotak yang diberi tanda (*) wajib diisi.</p>
                                        </div>
                                        <div class="flex">
                                            <span class="mr-2">b.</span>
                                            <p>Pastikan informasi yang diberikan sedapat mungkin memenuhi unsur 4W + 1H.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <span class="mr-3">4.</span>
                                <p>Jika anda memiliki bukti dalam bentuk file seperti foto atau dokumen lain dalam
                                    jumlah
                                    banyak, silahkan diinputkan satu persatu.</p>
                            </div>
                            <div class="flex">
                                <span class="mr-3">5.</span>
                                <p>Setelah selesai mengisi, silahkan klik tombol "Kirim" untuk melanjutkan atau klik
                                    tombol
                                    “Cancel" untuk membatalkan proses pelaporan anda.</p>
                            </div>
                            <div class="flex">
                                <span class="mr-3">6.</span>
                                <div>
                                    <p>Simpan dan ingat baik-baik Kode pengaduan anda</p>
                                    <div class="mt-2 ml-6 text-gray-600 space-y-2">
                                        <div class="flex">
                                            <span class="mr-2">a.</span>
                                            <p>Kode pengaduan dibutuhkan untuk membuat akun yang berfungsi untuk
                                                mengecek
                                                perkembangan status aduan Anda atau membuat pengaduan baru.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Video Tutorial dengan layout 2 kolom -->
                        <div class="mt-16 flex flex-col md:flex-row items-center gap-8">
                            <div class="w-full md:w-1/2 text-center md:text-left">
                                <h3 class="text-4xl font-extrabold text-gray-800 leading-tight">
                                    Tutorial Lengkap<br>WBS Bappenas
                                </h3>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="aspect-w-16 aspect-h-9">
                                    <iframe class="rounded-lg shadow-xl" src="https://www.youtube.com/embed/3QyQrLMMbMw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- [BAGIAN 7] FAQ SECTION (BARU) -->
            <section id="faq" class="py-20 bg-gray-50">
                <div class="container mx-auto px-6">
                    <!-- Judul Section -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Frequently
                            Asked
                            Questions</h2>
                        <div class="mt-2 w-24 h-1 bg-bappenas-darkblue mx-auto"></div>
                    </div>

                    <!-- Accordion Container -->
                    <div class="max-w-4xl mx-auto space-y-4" x-data="{ openFaq: 1 }">

                        <!-- FAQ Item 1 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 1 ? null : 1"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apa itu aplikasi Whistleblowing System
                                    (WBS) Kementerian PPN/Bappenas?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 1 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 1" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Aplikasi Whistleblowing System (WBS) Kementerian PPN/Bappenas adalah
                                    aplikasi pengelolaan dan tindak lanjut pengaduan serta pelaporan hasil pengelolaan
                                    pengaduan yang disediakan oleh Kementerian PPN/Bappenas sebagai salah satu sarana
                                    bagi
                                    setiap pejabat/pegawai Kementerian PPN/Bappenas sebagai pihak internal maupun
                                    masyarakat
                                    luas pengguna layanan Kementerian PPN/Bappenas sebagai pihak eksternal untuk
                                    melaporkan
                                    dugaan adanya pelanggaran dan/atau ketidakpuasan terhadap pelayanan yang
                                    dilakukan/diberikan oleh pejabat/pegawai Kementerian PPN/Bappenas.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 2 ? null : 2"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apakah kode pengaduan itu dan apa yang
                                    harus saya lakukan terhadap kode pengaduan ini?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 2 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 2" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Kode pengaduan adalah kode yang digunakan sebagai identitas pelapor
                                    dalam
                                    melakukan pembuatan user untuk melihat track record pengaduan.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 3 ? null : 3"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apakah bentuk respon yang diberikan
                                    kepada
                                    pelapor atas pengaduan yang disampaikan?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 3 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 3" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Respon yang diberikan kepada pelapor berupa status/tindak lanjut
                                    pengaduan
                                    yang ada dalam halaman user sesuai dengan respon yang telah diberikan oleh pihak
                                    penerima pengaduan. Respon terkait dengan status/tindak lanjut pengaduan dapat
                                    dilihat
                                    dalam halaman user pengaduan aplikasi WBS.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 4 ? null : 4"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Berapa lama respon atas pengaduan yang
                                    disampaikan diberikan kepada pelapor?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 4 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 4" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Sesuai dengan KMK 149 tahun 2011 jawaban/respon atas pengaduan yang
                                    disampaikan wajib diberikan dalam kurun waktu paling lambat 30 (tiga puluh) hari
                                    terhitung sejak pengaduan diterima. Untuk respon yang disampaikan tertulis melalui
                                    surat
                                    dapat diberikan apabila pelapor mencantumkan identitas secara jelas (nama dan alamat
                                    koresponden). Untuk respon dari media pengaduan lainnya akan disampaikan dan
                                    diberikan
                                    sesuai identitas pelapor yang dicantumkan dalam media pengaduan tersebut.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 5 ? null : 5"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apakah pengaduan yang saya berikan
                                    akan
                                    selalu mendapatkan respon?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 5 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 5" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Pengaduan yang anda berikan akan direspon dan tercantum dalam aplikasi
                                    WBS
                                    ini dan akan terupdate secara otomatis sesuai dengan respon yang telah diberikan
                                    oleh
                                    pihak penerima pengaduan. Untuk dapat melihat respon yang diberikan, anda harus
                                    login
                                    terlebih dahulu dengan username yang telah anda registrasikan di aplikasi ini dan
                                    anda
                                    dapat melihat status pengaduan dalam halaman user pengaduan sesuai dengan kode
                                    pengaduan
                                    yang didapatkan. Sebagai catatan, pengaduan anda akan lebih mudah ditindaklanjuti
                                    apabila memenuhi unsur pengaduan.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 6 ? null : 6"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apakah kerahasiaan identitas saya
                                    sebagai
                                    pengadu/pelapor terjaga?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 6 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 6" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Kerahasiaan identitas anda sebagai pelapor akan terjaga seperti yang
                                    telah
                                    disebutkan dalam KMK 149 tahun 2011. Namun agar kerahasiaan identitas anda dapat
                                    lebih
                                    terjaga sebaiknya anda memperhatikan hal-hal sebagaimana disebutkan disini.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 7 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 7 ? null : 7"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Apakah setiap melakukan pengaduan
                                    harus
                                    membuat dan register username baru?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 7 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 7" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Hal tersebut tidak perlu dilakukan. Satu username dapat melakukan
                                    pengaduan
                                    lebih dari satu. Ketika setelah selesai membuat satu pengaduan, anda dapat membuat
                                    pengaduan terkait dengan dugaan pelanggaran dan/atau ketidakpuasan terhadap
                                    pelayanan
                                    yang diberikan lainnya dengan memilih “tambah pengaduan”. Masing-masing pengaduan
                                    akan
                                    mendapatkan kode pengaduan yang berbeda.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 8 -->
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                            <button @click="openFaq = openFaq === 8 ? null : 8"
                                class="w-full flex justify-between items-center text-left p-5 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-800">Saya sudah mengirimkan pengaduan namun
                                    di
                                    kemudian hari saya ingin merubah/menambahkan data terkait pengaduan yang saya
                                    lakukan,
                                    apa yang harus saya lakukan? Apakah harus membuat pengaduan baru?</span>
                                <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                    :class="{ 'rotate-180': openFaq === 8 }" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFaq === 8" x-collapse
                                class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                                <p class="pt-4">Data yang sudah dilaporkan sebelumnya tidak dapat dilakukan perubahan
                                    namun
                                    anda bisa membuat pengaduan baru dilakukan dengan login username yang telah
                                    diregistrasikan sebelumnya di aplikasi ini lalu masuk ke halaman pengaduan. Dalam
                                    halaman pengaduan, lalu pilih menu buat pengaduan baru.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- [BAGIAN 8] KONTAK KAMI SECTION (FINAL) -->
            <section id="kontak" class="py-20 bg-gray-50">
                <div class="container mx-auto px-6">
                    <!-- Judul Section -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">
                            Alamat dan Kontak Kami
                        </h2>
                        <div class="mt-2 w-24 h-1 bg-bappenas-darkblue mx-auto"></div>
                        <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                            Hubungi kami untuk informasi lebih lanjut terkait layanan dan pengaduan di Inspektorat Utama
                            Bappenas
                        </p>
                    </div>

                    <!-- Peta Google -->
                    <div class="w-full rounded-lg overflow-hidden shadow-lg border mb-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63339.18601754096!2d109.66023591452464!3d-7.369392792701998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6542c5633a5f07%3A0x4027a76e352fe30!2sBanjarnegara%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1719740600000!5m2!1sid!2sid"
                            class="w-full h-[450px]" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <!-- KONTAK KAMI -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <!-- Alamat -->
                        <div class="flex items-start gap-2 text-sm md:text-base text-center md:text-left">
                            <svg class="w-6 h-6 text-bappenas-darkblue mt-1" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p>
                                Jl. Dipayuda No.16, Krandegan, Kec. Banjarnegara,<br>
                                Kab. Banjarnegara, Jawa Tengah 53418
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-2 text-sm md:text-base text-center md:text-left">
                            <svg class="w-6 h-6 text-bappenas-darkblue mt-1" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p>
                                sekretariat.irtama@bappenas.go.id<br>
                                inspektorat.utama.bappenas@gmail.com
                            </p>
                        </div>

                        <!-- Telepon -->
                        <div class="flex items-center gap-2 text-sm md:text-base">
                            <svg class="w-6 h-6 text-bappenas-darkblue" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p>(021) 31906288</p>
                        </div>

                        <!-- Instagram -->
                        <div class="flex items-center gap-2 text-sm md:text-base">
                            <svg class="w-6 h-6 text-bappenas-darkblue" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2z" />
                                <circle cx="12" cy="12" r="3.5" />
                                <circle cx="17" cy="7" r="1" />
                            </svg>
                            <p>@iubappenas</p>
                        </div>
                    </div>
                </div>
            </section>


            <!-- [BAGIAN 6] FOOTER -->
            <footer class="bg-gray-800 text-white text-xs">
                <div class="container mx-auto px-6 py-4 flex justify-center items-center">
                    <span class="text-center">© 2025 Dinkominfo Banjarnegara</span>
                </div>
            </footer>

            <!-- Tombol Scroll to Top (WARNA DIUBAH MENJADI BIRU) -->
            <button x-show="showScrollTop" @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-2"
                class="fixed bottom-8 right-8 bg-bappenas-darkblue text-white p-4 rounded-full shadow-lg hover:bg-bappenas-darkerblue focus:outline-none"
                style="display: none;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                    </path>
                </svg>
            </button>
        </div>
</body>

</html>