<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WBS Pemkab Banjarnegara</title>
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
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-custom p-4">

        <div class="w-full max-w-sm bg-white rounded-2xl shadow-xl p-8 space-y-6">
            <div class="text-center space-y-4">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-20 h-20 mx-auto">
                </a>
                <h2 class="text-2xl font-bold text-gray-800">BUAT PASSWORD BARU</h2>
            </div>

            @if ($errors->any())
                <div class="p-3 bg-red-100 border-l-4 border-red-500 text-red-700 text-sm" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Token Reset Password (Hidden) -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-4">
                    <!-- Input Email (Readonly) -->
                    <div class="input-wrapper">
                        <div class="input-icon"><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg></div>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                            readonly class="input-field bg-gray-100 cursor-not-allowed">
                    </div>

                    <!-- Input Password Baru -->
                    <div class="input-wrapper" x-data="{ show: false }">
                        <div class="input-icon"><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg></div>
                        <input id="password" :type="show ? 'text' : 'password'" name="password" required
                            placeholder="Password Baru" class="input-field pr-10">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center"><button type="button"
                                @click="show = !show"
                                class="text-gray-500 focus:outline-none"><!-- ikon mata di sini --></button></div>
                    </div>

                    <!-- Input Konfirmasi Password Baru -->
                    <div class="input-wrapper">
                        <div class="input-icon"><svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg></div>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            placeholder="Konfirmasi Password Baru" class="input-field pr-10">
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit"
                        class="w-full text-white font-bold py-3 px-4 rounded-full btn-primary transition-colors duration-300">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>