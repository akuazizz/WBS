<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi - WBS Bappenas</title>

    <!-- Menggunakan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Menggunakan CDN Alpine.js untuk interaktivitas -->
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

        .bg-gradient-bappenas {
            background-image: linear-gradient(to bottom right, #004b85, #004b85);
        }

        .btn-primary {
            background-color: #005a9e;
            border-radius: 9999px;
        }

        .btn-primary:hover {
            background-color: #004b85;
        }

        .link-custom {
            color: #005a9e;
        }

        .input-field {
            border-radius: 9999px;
            border: 1px solid #d1d5db;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            /* py-3 pl-10 pr-4 */
        }

        .input-field:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-bappenas">

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl">

            <div class="flex flex-col items-center">
                <a href="/">
                    <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-24 h-24">
                </a>
                <h2 class="mt-2 text-2xl font-bold text-gray-700 tracking-wider">REGISTRASI</h2>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                @csrf

                <!-- Kode Pengaduan -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg></div>
                    <input id="kode_pengaduan" type="text" name="kode_pengaduan" required placeholder="Kode Pengaduan"
                        class="input-field block w-full">
                </div>

                <!-- Nama -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg></div>
                    <input id="name" type="text" name="name" required placeholder="Nama"
                        class="input-field block w-full">
                </div>

                <!-- Email -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg></div>
                    <input id="email" type="email" name="email" required placeholder="Email"
                        class="input-field block w-full">
                </div>

                <!-- Kontak -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg></div>
                    <input id="kontak" type="text" name="kontak" required placeholder="Kontak"
                        class="input-field block w-full">
                </div>

                <!-- Jenis Kelamin -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H9a2 2 0 01-2-2v-1a4 4 0 014-4h2a4 4 0 014 4v1a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="input-field block w-full appearance-none text-gray-500">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Username -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <input id="username" type="text" name="username" required placeholder="Username"
                        class="input-field block w-full">
                </div>

                <!-- Password -->
                <div x-data="{ show: false }" class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <input id="password" :type="show ? 'text' : 'password'" name="password" required
                        placeholder="Password" class="input-field block w-full pr-10">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center"><button type="button"
                            @click="show = !show" class="focus:outline-none"><!-- ... ikon mata ... --></button></div>
                </div>

                <!-- Konfirmasi Password -->
                <div x-data="{ show: false }" class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation"
                        required placeholder="Konfirmasi Password" class="input-field block w-full pr-10">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center"><button type="button"
                            @click="show = !show" class="focus:outline-none"><!-- ... ikon mata ... --></button></div>
                </div>

                <div class="pt-4"><button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent shadow-sm text-lg font-medium text-white btn-primary transition-colors">Daftar</button>
                </div>
                <p class="text-center text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}"
                        class="font-bold link-custom hover:underline">Silahkan Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>