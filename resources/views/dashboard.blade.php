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
                            <a href="#" class="hover:underline">Beranda</a>
                            <a href="#alur" class="hover:underline">Alur</a>
                            <a href="#unsur" class="hover:underline">Unsur</a>
                            <a href="#" class="hover:underline">Kerahasiaan Pelapor</a>
                            <a href="#" class="hover:underline">Cara Melapor</a>
                            <a href="#" class="hover:underline">FAQ</a>
                            <a href="#" class="hover:underline">Kontak Kami</a>
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
                            <p class="mb-8 text-lg opacity-90">Mari bersama-sama menciptakan pemerintahan yang jujur dan
                                bersih, laporkan setiap pelanggaran yang terjadi di lingkungan kerja Anda.</p>
                            <div
                                class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                                <a href="#"
                                    class="px-8 py-3 bg-bappenas-darkblue font-bold rounded-md hover:bg-bappenas-darkerblue transition-colors text-center shadow-lg">Buat
                                    Pengaduan</a>
                                <a href="#"
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
                    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Alur Pengaduan
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Rangkaian tahapan sistematis yang dilalui
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
                            class="w-1/2 py-2 px-4 rounded-lg font-semibold transition-colors duration-300 flex items-center justify-center gap-2">
                            Alur Singkat
                        </button>
                        <button @click="activeTab = 'detail'"
                            :class="{ 'bg-gray-200 text-gray-700': activeTab !== 'detail', 'bg-bappenas-darkblue text-white shadow': activeTab === 'detail' }"
                            class="w-1/2 py-2 px-4 rounded-lg font-semibold transition-colors duration-300 flex items-center justify-center gap-2">
                            Alur Detail
                        </button>
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
                    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Unsur Pengaduan
                    </h2>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2" x-data="{ openAccordion: 1 }">
                        <p class="text-lg text-gray-600 mb-6">Pengaduan Anda akan mudah ditindaklanjuti apabila memenuhi
                            unsur sebagai berikut:</p>
                        <div class="space-y-4">
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 1 ? null : 1"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">1. What</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 1 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 1" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Perbuatan berindikasi pelanggaran yang diketahui</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 2 ? null : 2"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">2. Where</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 2 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
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
                                        :class="{ 'rotate-180': openAccordion === 3 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
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
                                        :class="{ 'rotate-180': openAccordion === 4 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 4" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Siapa saja yang terlibat dalam perbuatan tersebut</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 5 ? null : 5"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">5. How</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 5 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 5" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Bagaimana perbuatan tersebut dilakukan (modus, cara,
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

        <!-- [BAGIAN 5] FOOTER -->
        <footer class="bg-gray-800 text-white text-xs">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <span>HOME</span>
                <span class="text-center">© 2024 Inspektorat Utama Bappenas</span>
            </div>
        </footer>
    </div>

</body>

</html>