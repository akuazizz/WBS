<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi - WBS Bappenas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                <a href="/"><img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-24 h-24"></a>
                <h2 class="mt-2 text-2xl font-bold text-gray-700 tracking-wider">REGISTRASI</h2>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                @csrf
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
                        <strong class="font-bold">Oops! Terjadi kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Kode Pengaduan -->
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                                class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg></div>
                        <input id="kode_pengaduan" type="text" name="kode_pengaduan" value="{{ old('kode_pengaduan') }}"
                            required placeholder="Kode Pengaduan"
                            class="input-field block w-full @error('kode_pengaduan') border-red-500 @enderror">
                    </div>
                    <p class="mt-2 text-xs text-gray-600">Masukkan salah satu kode pengaduan, apabila pernah mengajukan
                        lebih dari sekali. Apabila belum pernah membuat pengaduan, silahkan <a
                            href="{{ route('pengaduan.create') }}" class="font-bold text-[#005a9e] hover:underline">Buat
                            Pengaduan</a> terlebih dahulu.</p>
                </div>

                <!-- Nama -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg></div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="Nama"
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
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email"
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
                    <input id="kontak" type="text" name="kontak" value="{{ old('kontak') }}" required
                        placeholder="Kontak" class="input-field block w-full">
                </div>

                <!-- Jenis Kelamin -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                            class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H9a2 2 0 01-2-2v-1a4 4 0 014-4h2a4 4 0 014 4v1a2 2 0 01-2 2z">
                            </path>
                        </svg></div>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="input-field block w-full appearance-none text-gray-500">
                        <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis Kelamin
                        </option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
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
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required
                        placeholder="Username" class="input-field block w-full">
                </div>

                <!-- Password -->
                <div>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><svg
                                class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg></div>
                        <input id="password" :type="show ? 'text' : 'password'" name="password" required
                            placeholder="Password" class="input-field block w-full pr-10">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <button type="button" @click="show = !show" class="text-gray-500 focus:outline-none">
                                <!-- Ikon mata terbuka (saat password disembunyikan) -->
                                <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Ikon mata tertutup (saat password ditampilkan) -->
                                <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .9-2.848 3.08-5.216 5.844-6.31M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c1.242 0 2.45.19 3.598.54M21.542 12c-1.274 4.057-5.064 7-9.542 7a10.05 10.05 0 01-1.275-.125" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.75 10.75l-8.5-8.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-600 space-y-1">
                        <p>Panjang minimal 6 karakter.</p>
                        <p>Mengandung setidaknya satu huruf besar.</p>
                        <p>Mengandung setidaknya satu angka.</p>
                        <p>Mengandung setidaknya satu karakter khusus (misal: !, @, #, dll.).</p>
                    </div>

                </div>

                <!-- Konfirmasi Password -->
                <div class="relative" x-data="{ show: false }">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation"
                        required placeholder="Konfirmasi Password" class="input-field block w-full pr-10">

                    {{-- ========================================================== --}}
                    {{-- ▼▼▼ INI BAGIAN YANG DIPERBAIKI ▼▼▼ --}}
                    {{-- ========================================================== --}}
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <button type="button" @click="show = !show" class="text-gray-500 focus:outline-none">
                            <!-- Ikon mata terbuka (saat password disembunyikan) -->
                            <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Ikon mata tertutup (saat password ditampilkan) -->
                            <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .9-2.848 3.08-5.216 5.844-6.31M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c1.242 0 2.45.19 3.598.54M21.542 12c-1.274 4.057-5.064 7-9.542 7a10.05 10.05 0 01-1.275-.125" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.75 10.75l-8.5-8.5" />
                            </svg>
                        </button>
                    </div>
                    {{-- ========================================================== --}}
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent shadow-sm text-lg font-medium text-white btn-primary transition-colors">Daftar</button>
                </div>
                <p class="text-center text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}"
                        class="font-bold link-custom hover:underline">Silahkan Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>