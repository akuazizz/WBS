<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS Pemkab Banjarnegara</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        /* GANTI DARI BIRU MUDA KE BIRU TUA */
        .bg-bappenas-blue {
            background-color: #004F98;
            /* Biru Tua */
        }

        .text-bappenas-darkblue {
            color: #004F98;
        }

        .hover\:bg-bappenas-darkerblue:hover {
            background-color: #004F98;
        }

        /* Tombol bulat custom */
        .btn-rounded {
            padding: 0.75rem 2rem;
            font-weight: bold;
            border-radius: 9999px;
            transition: all 0.3s ease;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-buat {
            background-color: #009FE3;
            color: white;
        }

        .btn-buat:hover {
            background-color: #009FE3;
        }

        .btn-tracking {
            background-color: #009FE3;
            color: white;
        }

        .btn-tracking:hover {
            background-color: #009FE3;
        }

        /* Responsive Aspect Ratio (Opsional) */
        @layer utilities {
            @variants responsive {
                .aspect-w-16 {
                    --tw-aspect-w: 16;
                }

                .aspect-h-9 {
                    --tw-aspect-h: 9;
                }

                .aspect-ratio {
                    position: relative;
                    padding-bottom: calc(var(--tw-aspect-h) / var(--tw-aspect-w) * 100%);
                }

                .aspect-ratio>* {
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                }
            }
        }
    </style>

</head>

<body class="antialiased bg-gray-50">

    <!-- Wrapper Utama dengan Alpine.js untuk Scroll to Top -->
    <div x-data="{ showScrollTop: false }" @scroll.window="showScrollTop = (window.pageYOffset > 300) ? true : false"
        class="flex flex-col min-h-screen">

  <!-- [BAGIAN 1] TOP LOGO BAR -->
<div class="bg-white py-2 border-b border-gray-200">
  <div class="w-full px-2 flex items-center space-x-4">
    
    <!-- Logo ASN Inspektorat -->
    <a href="#">
      <img
        src="{{ asset('images/asn-inspektorat.jpeg') }}"
        alt="ASN Inspektorat"
        class="h-10 md:h-12"
      >
    </a>

    <!-- Logo BerAKHLAK + #Bangga Melayani Bangsa -->
    <a href="#">
      <img
        src="{{ asset('images/berakhlak-bangga.jpg') }}"
        alt="BerAKHLAK | Bangga Melayani Bangsa"
        class="h-10 md:h-12"
      >
    </a>

  </div>
</div>


        <!-- [BAGIAN 2] NAVBAR -->
        <header class="bg-bappenas-blue shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-6">
                <div class="py-4 flex justify-between items-center">
                    <a href="#beranda" class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS Kabupaten Banjarnegara"
                            class="h-12">
                        <span class="text-white text-L font-bold">WBS KABUPATEN BANJARNEGARA</span>
                    </a>
                    <div class="hidden md:flex items-center space-x-8">
                        <nav class="flex items-center space-x-6 text-white font-semibold" id="navbar">
                            <a href="#beranda" data-section="beranda"
                                class="hover:underline hover:text-blue-300 transition-colors">Beranda</a>
                            <a href="#alur" data-section="alur"
                                class="hover:underline hover:text-blue-300 transition-colors">Alur</a>
                            <a href="#unsur" data-section="unsur"
                                class="hover:underline hover:text-blue-300 transition-colors">Unsur</a>
                            <a href="#kerahasiaan" data-section="kerahasiaan"
                                class="hover:underline hover:text-blue-300 transition-colors">Kerahasiaan Pelapor</a>
                            <a href="#cara-melapor" data-section="cara-melapor"
                                class="hover:underline hover:text-blue-300 transition-colors">Cara Melapor</a>
                            <a href="#faq" data-section="faq"
                                class="hover:underline hover:text-blue-300 transition-colors">FAQ</a>
                            <a href="#kontak" data-section="kontak"
                                class="hover:underline hover:text-blue-300 transition-colors">Kontak Kami</a>
                        </nav>

                        <!-- Tombol Masuk -->
                        <div>
                            <a href="{{ route('login') }}"
                                class="px-5 py-2 text-sm bg-white text-bappenas-darkblue font-semibold rounded shadow hover:bg-gray-100 flex items-center space-x-2 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Masuk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- [BAGIAN 3] HERO SECTION -->
        <section id="beranda" class="min-h-screen bg-bappenas-blue flex items-center">
            <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center md:space-x-16 lg:space-x-20">

                <div class="w-full md:w-1/2 flex justify-center md:justify-center mb-10 md:mb-0">
                    <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS Kabupaten Banjarnegara"
                        class="max-w-xs md:max-w-sm lg:max-w-md h-auto drop-shadow-2xl">
                </div>

                <div class="w-full md:w-1/2 text-center md:text-left text-white">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-snug mb-6">
                        Selamat Datang di Aplikasi<br>
                        Whistleblowing System<br>
                        Kabupaten Banjarnegara
                    </h1>
                    <p class="text-lg opacity-90 mb-8">
                        Ayo turut berperan dalam mewujudkan pemerintahan yang bersih dan berintegritas dengan
                        melaporkan setiap bentuk pelanggaran yang terjadi di lingkungan kerja Anda.
                    </p>
                    <div
                        class="flex flex-col sm:flex-row justify-center md:justify-start items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('pengaduan.create') }}" class="btn-rounded btn-buat">
                            Buat Pengaduan
                        </a>
                        <a href="{{ route('tracking.index') }}" class="btn-rounded btn-tracking">
                            Cek Tracking Pengaduan
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- [BAGIAN 4] ALUR PENGADUAN SECTION -->
        <section id="alur" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <!-- Judul Section -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Alur Pengaduan
                    </h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Rangkaian tahapan sistematis yang dilalui dalam menangani dan menyelesaikan Pengaduan yang
                        diajukan oleh Pelapor
                    </p>
                </div>

                <!-- Tombol Panduan -->
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-12">
                    <a href="https://youtu.be/3QyQrLMMbMw?feature=shared" target="_blank"
                        class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg shadow-sm bg-bappenas-blue text-white font-semibold hover:bg-[#C0C0C0] transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Video Tutorial Panduan WBS
                    </a>
                    <a href="/img/Buku_Panduan_WBS_2024_Pelapor.pdf" target="_blank"
                        class="inline-flex items-center justify-center px-6 py-3 bg-bappenas-blue border border-gray-300 rounded-lg shadow-sm text-white font-semibold hover:bg-[#C0C0C0] transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Buku Panduan Pelapor
                    </a>
                </div>

                <!-- Tab Switcher -->
                <div x-data="{ activeTab: 'singkat' }" class="max-w-5xl mx-auto">
                    <div class="flex justify-center p-1 rounded-xl bg-white shadow max-w-sm mx-auto">
                        <button @click="activeTab = 'singkat'"
                            :class="activeTab === 'singkat' ? 'bg-[#C0C0C0] text-white' : 'bg-bappenas-blue text-white'"
                            class="w-1/2 py-2 px-4 rounded-lg font-semibold hover:bg-[#C0C0C0] transition-colors">
                            Alur Singkat
                        </button>
                        <button @click="activeTab = 'detail'"
                            :class="activeTab === 'detail' ? 'bg-[#C0C0C0] text-white' : 'bg-bappenas-blue text-white'"
                            class="w-1/2 py-2 px-4 rounded-lg font-semibold hover:bg-[#C0C0C0] transition-colors">
                            Alur Detail
                        </button>
                    </div>

                    <!-- Konten Tab -->
                    <div class="mt-8 relative">
                        <!-- Alur Singkat -->
                        <div x-show="activeTab === 'singkat'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <img src="{{ asset('images/alur-singkat.png') }}" alt="Diagram Alur Pengaduan Singkat"
                                class="rounded-lg shadow-xl mx-auto">
                        </div>

                        <!-- Alur Detail -->
                        <div x-show="activeTab === 'detail'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            style="display: none;">
                          <img src="{{ asset('images/alur-detail.png') }}" alt="Diagram Alur Pengaduan Detail"
                                alt="Diagram Alur Pengaduan Detail" class="rounded-lg shadow-xl mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- [BAGIAN 5] UNSUR PENGADUAN SECTION -->
        <section id="unsur" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">
                        Unsur Pengaduan
                    </h2>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2 flex justify-center">
                        <img src="{{ asset('images/unsur-pengaduan.png') }}" alt="Diagram Unsur Pengaduan"
                            class="max-w-md w-full h-auto rounded-lg shadow-xl">
                    </div>

                    <div class="w-full md:w-1/2" x-data="{ openAccordion: 1 }">
                        <p class="text-lg text-gray-600 mb-6">
                            Pengaduan Anda akan mudah ditindaklanjuti apabila memenuhi unsur sebagai berikut:
                        </p>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 1 ? null : 1"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">1. What</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 1 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 1" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Perbuatan berindikasi pelanggaran yang diketahui</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 2 ? null : 2"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">2. Where</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 2 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 2" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Dimana perbuatan tersebut dilakukan</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 3 ? null : 3"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">3. When</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 3 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 3" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Kapan perbuatan tersebut dilakukan</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 4 ? null : 4"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">4. Who</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 4 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="openAccordion === 4" x-collapse>
                                    <div class="p-5 border-t">
                                        <p class="text-gray-600">Siapa saja yang terlibat dalam perbuatan tersebut</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="border rounded-lg overflow-hidden">
                                <button @click="openAccordion = openAccordion === 5 ? null : 5"
                                    class="w-full flex justify-between items-center p-5 bg-gray-100 hover:bg-gray-200 transition-colors">
                                    <span class="text-lg font-semibold text-gray-800">5. How</span>
                                    <svg class="w-6 h-6 transform transition-transform"
                                        :class="{ 'rotate-180': openAccordion === 5 }" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
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
                </div>
            </div>
        </section>

     <!-- [BAGIAN 6] KERAHASIAAN PELAPOR SECTION -->
    <section id="kerahasiaan" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <!-- Judul Section -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">Kerahasiaan Pelapor</h2>
        </div>

        <!-- Penjelasan Utama di Tengah -->
        <div class="max-w-4xl mx-auto text-left mt-6 mb-6">
            <h3 class="text-lg font-semibold text-bappenas-darkblue leading-relaxed">
                Pemerintah Kabupaten Banjarnegara akan merahasiakan identitas pribadi Anda sebagai whistleblower karena Pemerintah Kabupaten Banjarnegara hanya fokus pada informasi yang Anda laporkan. Untuk memastikan kerahasiaan tetap terlindungi, harap perhatikan hal-hal berikut ini:
            </h3>
        </div>

        <!-- Layout Gambar & Poin -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-12">
            <!-- Kolom Kiri: Poin -->
            <div class="w-full md:w-6/12">
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                        </svg>
                        <span class="text-gray-800">Untuk menjaga kerahasiaan identitas Anda, mohon untuk tidak mencantumkan data pribadi seperti nama atau hubungan Anda dengan pihak yang dilaporkan.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                        </svg>
                        <span class="text-gray-800">Hindari menyampaikan informasi apa pun yang dapat mengarahkan pihak lain untuk mengidentifikasi Anda.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-gray-800 mr-3 mt-1 flex-shrink-0" fill="none"
                             stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                        </svg>
                        <span class="text-gray-800">Pastikan nama pengguna (username), kata sandi (password), serta nomor registrasi Anda tetap bersifat rahasia dan tidak diketahui oleh pihak lain.</span>
                    </li>
                </ul>
            </div>

            <!-- Kolom Kanan: Gambar -->
            <div class="w-full md:w-5/12">
                <img src="{{ asset('images/kerahasiaan.png') }}" alt="Ilustrasi Kerahasiaan Data"
                     class="w-full h-auto">
            </div>
        </div>
    </div>
</section>


       <!-- [BAGIAN 7] CARA MELAPOR SECTION -->
<section id="cara-melapor" class="py-20 bg-white">
  <div class="container mx-auto px-6">
   <!-- Judul Section -->
    <div class="text-center mb-16">
    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">CARA MELAPOR</h2>
    <p class="mt-2 text-gray-600">Ikuti panduan berikut untuk menyampaikan laporan Anda dengan mudah dan aman</p>
    </div>

    <!-- Konten 2 Kolom -->
    <div class="flex flex-col md:flex-row gap-10 mt-10 items-start justify-center">
      
      <!-- Kolom Kiri: Langkah-langkah -->
      <div class="w-full md:w-auto max-w-md space-y-6 mx-auto">
        
        <!-- Card 1 -->
<div class="bg-[#4682B4] p-4 rounded-lg shadow text-sm text-white">
  <div class="flex items-start gap-3">
    <div class="mt-1">
      <!-- Icon Kalender -->
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10m-11 8h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>
    </div>
    <div>
      <p class="font-semibold text-white">Mulai Pengaduan</p>
      <p class="text-white">Klik tombol “Buat Pengaduan” untuk memulai laporan baru</p>
    </div>
  </div>
</div>

<!-- Card 2 -->
<div class="bg-[#4682B4] p-4 rounded-lg shadow text-sm text-white">
  <div class="flex items-start gap-3">
    <div class="mt-1">
      <!-- Icon Dokumen -->
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 16h8M8 12h8m-6 8h6a2 2 0 002-2V7.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0013.586 2H8a2 2 0 00-2 2v16a2 2 0 002 2z" />
      </svg>
    </div>
    <div>
      <p class="font-semibold text-white">Isi Formulir</p>
      <ul class="list-disc list-inside text-white">
        <li>Semua kotak yang diberi tanda (*) wajib diisi.</li>
        <li>Pastikan informasi mencangkup unsur 4W + 1 H.</li>
        <li>Jika anda memiliki bukti dalam bentuk file seperti foto atau dokumen lain dalam jumlah banyak, silahkan diinputkan satu per satu.</li>
        <li>Setelah selesai mengisi, silahkan klik tombol "Kirim" untuk melanjutkan atau klik tombol “Cancel" untuk membatalkan proses pelaporan anda.</li>
      </ul>
    </div>
  </div>
</div>

      <!-- Card 3 -->
<div class="bg-[#4682B4] p-4 rounded-lg shadow text-sm text-white">
  <div class="flex items-start gap-3">
    <div class="mt-1">
      <!-- Icon Kunci -->
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-8V7a4 4 0 10-8 0v2a4 4 0 008 0zM5 12h14a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" />
      </svg>
    </div>
    <div>
      <p class="font-semibold text-white">Simpan Kode Pengaduan</p>
      <p class="text-white">
        Catat dan simpan kode pengaduan karena dibutuhkan untuk membuat akun yang berfungsi untuk mengecek perkembangan status aduan Anda atau membuat pengaduan baru.
      </p>
    </div>
  </div>
</div>

      </div>

    <!-- Kolom Kanan: Video -->
<div class="w-full md:w-1/2">
  <div class="bg-[#4682B4] p-4 rounded-lg shadow text-white">
    <h3 class="text-lg font-semibold text-center mb-2">
      Tutorial Lengkap WBS Kabupaten Banjarnegara
    </h3>

    <!-- Logo di atas video -->
   <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="mx-auto mb-4 w-32 h-auto" />

    <!-- Video -->
    <div class="aspect-w-16 aspect-h-9">
      <iframe
        class="rounded-lg w-full h-64"
        src="https://www.youtube.com/embed/3QyQrLMMbMw"
        title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    </div>
  </div>
</div>


    </div>
  </div>
</section>

        <!-- [BAGIAN 8] FAQ SECTION -->
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
                                (WBS) Inspektorat Kabupaten Banjarnegara?</span>
                            <svg class="w-6 h-6 transform transition-transform text-gray-500 flex-shrink-0"
                                :class="{ 'rotate-180': openFaq === 1 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Aplikasi Whistleblowing System (WBS) Inspektorat Banjarnegara adalah aplikasi yang disediakan oleh 
                                Pemerintah Kabupaten Banjarnegara untuk mengelola dan menindaklanjuti laporan atau pengaduan. 
                                Aplikasi ini menjadi wadah bagi pegawai pemerintah (sebagai pihak internal) 
                                maupun masyarakat umum (sebagai pihak eksternal) untuk melaporkan dugaan pelanggaran atau ketidakpuasan 
                                terhadap pelayanan yang diberikan oleh pejabat atau pegawai di lingkungan Pemerintah Kabupaten Banjarnegara.</p>
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
                        <div x-show="openFaq === 2" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Kode pengaduan berfungsi sebagai identitas pelapor yang digunakan untuk membuat akun (user) 
                                guna memantau riwayat atau perkembangan pengaduan yang telah dikirimkan.</p>
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
                        <div x-show="openFaq === 3" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Tanggapan kepada pelapor disampaikan dalam bentuk status atau tindak lanjut pengaduan 
                                yang ditampilkan pada halaman pengguna, sesuai dengan respon dari pihak yang menerima pengaduan. 
                                Informasi mengenai status atau tindak lanjut tersebut dapat diakses oleh pelapor melalui halaman 
                                pengaduan di aplikasi WBS.</p>
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
                        <div x-show="openFaq === 4" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Berdasarkan KMK 149 Tahun 2011, setiap pengaduan yang masuk wajib mendapatkan tanggapan atau jawaban 
                                paling lambat dalam waktu 30 (tiga puluh) hari sejak pengaduan diterima. Jika pengaduan diajukan secara tertulis melalui surat, 
                                maka jawaban akan diberikan apabila pelapor mencantumkan identitas yang jelas, seperti nama dan alamat. Sementara itu, 
                                untuk pengaduan yang disampaikan melalui media lainnya, tanggapan akan diberikan sesuai dengan identitas pelapor yang 
                                tercantum pada media pengaduan tersebut.</p>
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
                        <div x-show="openFaq === 5" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Pengaduan yang Anda sampaikan akan ditanggapi dan ditampilkan dalam aplikasi WBS ini. 
                                Informasi pada aplikasi akan diperbarui secara otomatis sesuai dengan tanggapan dari pihak yang menerima pengaduan. 
                                Untuk melihat tanggapan tersebut, Anda perlu login menggunakan username yang sudah Anda daftarkan. Setelah login, 
                                Anda dapat memantau status pengaduan melalui halaman pengguna, berdasarkan kode pengaduan yang telah Anda terima. 
                                Perlu diketahui, pengaduan akan lebih mudah ditindaklanjuti jika telah memenuhi unsur-unsur pengaduan yang lengkap.</p>
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
                        <div x-show="openFaq === 6" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Identitas Anda sebagai pelapor akan dijaga kerahasiaannya sesuai dengan ketentuan dalam KMK 149 Tahun 2011. 
                                Namun, untuk memastikan perlindungan identitas Anda lebih optimal, 
                                disarankan agar Anda memperhatikan beberapa hal yang dijelaskan di sini.</p>
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
                        <div x-show="openFaq === 7" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Anda tidak perlu membuat akun baru untuk setiap pengaduan. Satu username dapat digunakan untuk membuat beberapa pengaduan. 
                                Setelah menyelesaikan satu laporan, Anda bisa membuat laporan baru terkait dugaan pelanggaran atau ketidakpuasan terhadap pelayanan 
                                lainnya dengan memilih opsi "tambah pengaduan". Setiap laporan yang dibuat akan memiliki kode pengaduan yang berbeda sebagai identitas 
                                masing-masing pengaduan.</p>
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
                        <div x-show="openFaq === 8" x-collapse class="px-5 pb-5 text-gray-600 leading-relaxed border-t">
                            <p class="pt-4">Data pengaduan yang sudah dikirim sebelumnya tidak bisa diubah. 
                                Namun, Anda tetap dapat membuat pengaduan baru dengan login menggunakan username 
                                yang sudah Anda daftarkan di aplikasi ini. Setelah login, masuk ke halaman pengaduan dan 
                                pilih menu "Buat Pengaduan Baru" untuk mengirim laporan baru.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- [BAGIAN 9] KONTAK KAMI SECTION -->
        <section id="kontak" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <!-- Judul Section -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-bappenas-darkblue uppercase tracking-wider">
                        Alamat dan Kontak Kami
                    </h2>
                    <div class="mt-2 w-24 h-1 bg-bappenas-darkblue mx-auto"></div>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Hubungi kami untuk informasi lebih lanjut terkait layanan dan pengaduan di Inspektorat Kabupaten
                        Banjarnegara
                    </p>
                </div>

                <!-- Peta Google -->
                <div class="w-full rounded-lg overflow-hidden shadow-lg border mb-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6315604566303!2d109.6928989747618!3d-7.395115992614738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa9166ae4ad25%3A0x5f07dbc8912a2978!2sInspektorat%20Kabupaten%20Banjarnegara!5e0!3m2!1sid!2sid!4v1751352313918!5m2!1sid!2sid"
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p>
                            Jl. Dipayuda No.10, Kutabanjarnegara, Kec. Banjarnegara,<br>
                            Kab. Banjarnegara, Jawa Tengah 53415
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
                            wbs@banjarnegarakab.go.id<br>
                            inspektorat@banjarnegarakab.go.id
                        </p>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-center gap-2 text-sm md:text-base">
                        <svg class="w-6 h-6 text-bappenas-darkblue" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p>(0286) 591459, 591084</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- [BAGIAN 10] FOOTER -->
        <footer class="text-white text-center py-5" style="background-color: #004F98;">
            <p class="text-sm">© 2025 Inspektorat Kabupaten Banjarnegara</p>
            <p class="text-xs text-gray-100 mt-1">Designed by Magang 2025</p>
        </footer>

        <!-- Tombol Scroll to Top -->
        <button x-show="showScrollTop" @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed bottom-8 right-8 bg-blue-800 text-white p-4 rounded-full shadow-lg hover:bg-blue-900 focus:outline-none"
            style="display: none;">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                </path>
            </svg>
        </button>
    </div>

    <!-- SCROLL SPY SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll("section[id]");
            const navLinks = document.querySelectorAll("nav a[data-section]");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute("id");
                    const link = document.querySelector(`nav a[data-section="${id}"]`);

                    if (entry.isIntersecting) {
                        navLinks.forEach(l => l.classList.remove("text-blue-300", "underline"));
                        if (link) {
                            link.classList.add("text-blue-300", "underline");
                        }
                    }
                });
            }, {
                threshold: 0.3
            });

            sections.forEach(section => observer.observe(section));

            if (window.scrollY === 0) {
                const link = document.querySelector('nav a[data-section="beranda"]');
                navLinks.forEach(l => l.classList.remove("text-blue-300", "underline"));
                if (link) link.classList.add("text-blue-300", "underline");
            }
        });
    </script>

</body>

</html>