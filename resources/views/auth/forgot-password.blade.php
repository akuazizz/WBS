<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WBS Pemkab Banjarnegara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-wbs.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-custom {
            background: #004b85;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            padding-left: 1rem;
            display: flex;
            align-items: center;
            pointer-events: none;
        }

        .input-field {
            width: 100%;
            background-color: white;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
        }

        .btn-primary {
            background-color: #005a9e;
        }

        .btn-primary:hover {
            background-color: #004b85;
        }

        .btn-secondary {
            background-color: #3b82f6;
        }

        .btn-secondary:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-custom p-4">

        {{-- Kotak Form Utama --}}
        <div class="w-full max-w-sm bg-white rounded-2xl shadow-xl p-8 space-y-6">

            {{-- Header dengan Logo --}}
            <div class="text-center space-y-4">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-20 h-20 mx-auto">
                </a>
                <h2 class="text-2xl font-bold text-gray-800">RESET PASSWORD</h2>
            </div>

            <div class="text-sm text-center text-gray-600">
                Lupa password Anda? Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan link untuk
                mereset password.
            </div>

            <!-- Menampilkan Status Sesi (Pesan Sukses) -->
            <x-auth-session-status class="text-green-700 bg-green-100 p-3 rounded-md text-sm text-center"
                :status="session('status')" />

            <!-- Menampilkan Error Validasi -->
            @if ($errors->any())
                <div class="p-3 bg-red-100 border-l-4 border-red-500 text-red-700 text-sm" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="space-y-4">
                    <!-- Input Email -->
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="Masukkan Email Anda" class="input-field">
                    </div>
                </div>

                <div class="flex flex-col space-y-3 pt-6">
                    <button type="submit"
                        class="w-full text-white font-bold py-3 px-4 rounded-full btn-primary transition-colors duration-300">
                        Kirim Link Reset Password
                    </button>
                    <a href="{{ route('login') }}"
                        class="w-full text-center text-white font-bold py-3 px-4 rounded-full btn-secondary transition-colors duration-300">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>