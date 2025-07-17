<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WBS Pemkab Banjarnegara</title>

    <!-- Menggunakan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Menggunakan CDN Alpine.js untuk interaktivitas -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/logo-wbs.png') }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-inspektorat {
            background-image: linear-gradient(to bottom right, #004b85, #004b85);
        }

        .btn-primary {
            background-color: #005a9e;
            border-radius: 9999px;
        }

        .btn-primary:hover {
            background-color: #004b85;
        }

        .btn-secondary {
            background-color: #3e8ab8;
            border-radius: 9999px;
        }

        .btn-secondary:hover {
            background-color: #357ca5;
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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-inspektorat">

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl">

            <div class="flex flex-col items-center">
                <a href="/">
                    <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS Kabupaten Banjarnegara"
                        class="w-24 h-24">
                </a>
                <h2 class="mt-2 text-2xl font-bold text-gray-700 tracking-wider">LOGIN</h2>
            </div>

            {{-- Pesan Error --}}
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

            <form novalidate method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Email -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="Email" class="input-field block w-full @error('email') border-red-500 @enderror">
                </div>

                <!-- Password -->
                <div x-data="{ show: false }" class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input id="password" :type="show ? 'text' : 'password'" name="password" required
                        placeholder="Password"
                        class="input-field block w-full pr-10 @error('password') border-red-500 @enderror">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <button type="button" @click="show = !show" class="focus:outline-none">
                            <svg x-show="!show" class="w-5 h-5 text-gray-400 hover:text-gray-600"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg x-show="show" class="w-5 h-5 text-gray-400 hover:text-gray-600"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243l-4.243-4.243" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="space-y-4 pt-4">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent shadow-sm text-lg font-medium text-white btn-primary transition-colors">
                        Masuk
                    </button>
                    <a href="{{ url('/') }}"
                        class="w-full flex justify-center py-3 px-4 border border-transparent shadow-sm text-lg font-medium text-white btn-secondary transition-colors">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                        </svg>
                        Kembali Ke Beranda
                    </a>
                </div>

                <div class="text-center text-sm mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            Lupa Password? <span class="font-bold link-custom hover:underline">Silahkan Reset
                                Password</span>
                        </a>
                    @endif
                    <p class="mt-2 text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold link-custom hover:underline">Silahkan Buat
                            Akun terlebih dahulu</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>