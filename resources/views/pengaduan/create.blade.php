<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WBS Pemkab Banjarnegara</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/logo-wbs.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #004b85;
        }

        .text-inspektorat-title {
            color: #005a9e;
        }

        .bg-inspektorat-button {
            background-color: #005a9e;
        }

        .hover\:bg-inspektorat-button-hover:hover {
            background-color: #004b85;
        }

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
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input-custom:focus {
            border-color: #005a9e;
            box-shadow: 0 0 0 2px rgba(0, 90, 158, 0.3);
            outline: none;
        }

        textarea {
            height: auto;
            min-height: 8rem;
        }

        input[type="radio"]:checked {
            background-color: #005a9e;
            border-color: #005a9e;
        }

        input[type="file"] {
            background-color: transparent;
            border: none;
            padding: 0;
            height: auto;
            width: auto;
            box-shadow: none;
        }
    </style>
</head>

<body class="antialiased" x-data="{ showModal: true }" x-init="$nextTick(() => showModal = true)">

    <!-- Header -->
    <header class="py-4 bg-white shadow-sm">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo Horizontal -->
            <div class="flex items-center space-x-4">
                <a href="#">
                    <img src="https://inspektorat.banjarnegarakab.go.id/wp-content/uploads/2020/03/nama.png"
                        alt="Logo Inspektorat" class="h-10">
                </a>
                <a href="#">
                    <img src="{{ asset('images/berakhlak-bangga.png') }}" alt="Logo berAKHLAK" class="h-10">
                </a>
            </div>
            <!-- Navigasi -->
            <nav class="flex items-center space-x-6 text-inspektorat-title font-semibold">
                <a href="{{ url('/') }}" class="hover:underline">Menu Utama</a>
                <a href="{{ route('tracking.index') }}" class="hover:underline">Cek Tracking</a>
                <a href="{{ route('login') }}"
                    class="px-5 py-2 text-sm bg-inspektorat-button text-white rounded hover:bg-inspektorat-button-hover flex items-center space-x-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Masuk</span>
                </a>
            </nav>
        </div>
    </header>


    <!-- Form Pengaduan -->
    <main class="py-10">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center text-white mb-8">
                <h1 class="text-4xl font-extrabold">KIRIM PENGADUAN</h1>
                <p class="mt-2 text-lg">
                    Mari bersama-sama menciptakan pemerintahan yang jujur dan bersih, laporkan
                    setiap pelanggaran yang terjadi di lingkungan kerja Anda.
                </p>
            </div>

            <!-- 
                ============================================================
                PERBAIKAN PENTING PADA FORM:
                1. id="form-pengaduan" ditambahkan agar bisa ditarget oleh JavaScript.
                2. action="{{ route('pengaduan.store') }}" mengarah ke route named di Laravel.
                3. @csrf ditambahkan untuk keamanan (CSRF Protection).
                ============================================================
             -->
            <form id="form-pengaduan" action="{{ route('pengaduan.store') }}" method="POST"
                enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
                @csrf
                <h3 class="text-xl font-bold text-gray-800 border-b pb-4">Form Pengaduan</h3>

                <!-- NAMA TERDUGA -->
                <div>
                    <label for="nama_terduga" class="block text-sm font-medium text-gray-700 mb-1">Nama Terduga</label>
                    <input type="text" name="nama_terduga" id="nama_terduga" required
                        class="form-input-custom block w-full rounded-md shadow-sm sm:text-sm">
                    <p class="mt-1 text-xs text-gray-500">
                        Nama terduga adalah nama pegawai ASN yang terlibat.
                    </p>
                </div>

                <!-- JABATAN TERDUGA -->
                <div>
                    <label for="jabatan_terduga" class="block text-sm font-medium text-gray-700 mb-1">Jabatan
                        Terduga</label>
                    <input type="text" name="jabatan_terduga" id="jabatan_terduga"
                        class="form-input-custom block w-full rounded-md shadow-sm sm:text-sm">
                    <p class="mt-1 text-xs text-gray-500">
                        Jika Anda tidak tahu jabatannya, maka kosongkan saja.
                    </p>
                </div>

                <!-- UNIT KERJA -->
                <div>
                    <label for="unit_kerja" class="block text-sm font-medium text-gray-700 mb-1">Unit Kerja</label>
                    <input type="text" name="unit_kerja" id="unit_kerja"
                        class="form-input-custom block w-full rounded-md shadow-sm sm:text-sm">
                </div>

                <!-- URAIAN PENGADUAN -->
                <div>
                    <label for="uraian_pengaduan" class="block text-sm font-medium text-gray-700 mb-1">Uraian
                        Pengaduan</label>
                    <textarea name="uraian_pengaduan" id="uraian_pengaduan" rows="4" required
                        class="form-input-custom block w-full rounded-md shadow-sm sm:text-sm"></textarea>
                    <p class="mt-1 text-xs text-gray-500">Uraian pengaduan harus memenuhi unsur 4W 1H (What, Where,
                        When, Who, How).</p>
                </div>

                <!-- DOKUMEN PENDUKUNG -->
                <div>
                    <label for="dokumen" class="block text-sm font-medium text-gray-700 mb-1">Dokumen Pendukung</label>
                    <input type="file" name="dokumen" id="dokumen" class="text-gray-700
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-sky-100 file:text-sky-700
                                  hover:file:bg-sky-200">
                </div>

                @guest
                    {{-- Informasi Pelapor --}}
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Informasi Pelapor</label>
                        <div class="mt-2 flex items-center space-x-6">
                            <div class="flex items-center">
                                <input id="asn" name="jenis_pelapor" type="radio" value="asn"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="asn" class="ml-3 block text-sm font-medium text-gray-700">ASN</label>
                            </div>
                            <div class="flex items-center">
                                <input id="umum" name="jenis_pelapor" type="radio" value="umum"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" checked>
                                <label for="umum" class="ml-3 block text-sm font-medium text-gray-700">Umum</label>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="anda@contoh.com" required>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Masukkan alamat email yang valid untuk menerima kode tracking
                            pengaduan Anda.</p>
                    </div>
                @endguest

                <!-- SUBMIT -->
                <div class="pt-5 border-t">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-inspektorat-button hover:bg-inspektorat-button-hover transition-colors disabled:opacity-50">
                        Buat Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Modal Jaminan Kerahasiaan -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
        @click.self="showModal = false" style="display: none;">
        <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full" @click.away="showModal = false">
            <!-- Modal Header -->
            <div class="p-4 flex justify-between items-center border-b">
                <div class="flex items-center">
                    <img src="https://inspektorat.banjarnegarakab.go.id/wp-content/uploads/2020/03/nama.png"
                        alt="Logo Inspektorat" class="h-8 mr-4">
                    <img src="{{ asset('images/berakhlak-bangga.png') }}" alt="Logo berAKHLAK" class="h-10">
                </div>
                <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 text-2xl">×</button>
            </div>

            <!-- Modal Body -->
            <div class="p-8">
                <div class="text-center mb-6">
                    <div class="mx-auto bg-red-100 rounded-full h-16 w-16 flex items-center justify-center">
                        <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mt-4">
                        Data Pelapor Terjamin Karena Dilindungi Undang‑Undang
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Data pelapor pada Whistleblowing System dilindungi oleh UU No. 27 Tahun 2022 tentang
                        Perlindungan Data Pribadi.
                    </p>
                </div>
                <div class="bg-red-50 p-4 rounded-lg text-sm text-red-800">
                    <p class="font-bold">
                        Pemerintah Kabupaten Banjarnegara akan merahasiakan identitas pribadi Anda, perhatikan hal-hal
                        berikut:
                    </p>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <li>Jika ingin identitas Anda tetap rahasia, jangan mengisikan data pribadi atau data/informasi
                            yang dapat melacak siapa Anda.</li>
                        <li>Gunakan email anonim jika perlu, namun pastikan email tersebut aktif untuk menerima kode
                            tracking.</li>
                        <li>Jangan sampai orang lain mengetahui nama samaran atau password Anda (jika ada).</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Submit Form via Fetch API -->
    <script>
        document.getElementById('form-pengaduan').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');

            submitButton.disabled = true;
            submitButton.innerHTML = 'Mengirim...';

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    form.reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Pengaduan Berhasil Terkirim!',
                        html: `Kode tracking Anda adalah: <br>
                                <span id="kodeTracking" style="cursor:pointer; font-size: 1.2em; color: #005a9e; background-color: #f0f0f0; padding: 5px 10px; border-radius: 6px; display: inline-block;" title="Klik untuk menyalin">
                                ${data.kode_pengaduan}
                                </span>
                                <br><br>Kode ini telah dikirim ke email Anda. Simpan dengan baik dan gunakan untuk mengecek status pengaduan serta mendaftar akun di WBS.`,
                                confirmButtonText: 'Luar Biasa!'
                    }).then(() => {

                    });
                    setTimeout(() => {
                        const kodeEl = document.getElementById('kodeTracking');
                        if (kodeEl) {
                            kodeEl.addEventListener('click', () => {
                                const text = kodeEl.innerText;
                                navigator.clipboard.writeText(text).then(() => {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Kode Tersalin!',
                                        text: 'Kode tracking telah disalin ke clipboard.',
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                }).catch(err => {
                                    console.error('Gagal menyalin:', err);
                                });
                            });
                        }
                    }, 100);
                })
                .catch(errorData => {
                    console.error('Error:', errorData);
                    let errorMessages = 'Terjadi kesalahan pada server. Silakan coba lagi.';

                    if (errorData.errors) {
                        errorMessages = '<ul class="text-left list-disc list-inside">';
                        for (const key in errorData.errors) {
                            errorMessages += `<li>${errorData.errors[key][0]}</li>`;
                        }
                        errorMessages += '</ul>';
                    } else if (errorData.message) {
                        errorMessages = errorData.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops... Gagal Mengirim',
                        html: errorMessages,
                    });
                })
                .finally(() => {
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Buat Pengaduan';
                });
        });
    </script>
</body>

</html>