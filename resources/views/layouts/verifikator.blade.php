<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>WBS Pemkab Banjarnegara</title>

  <!-- Scripts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link rel="icon" type="image/png" href="{{ asset('images/logo-wbs.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
      /* Latar belakang abu-abu muda */
    }

    .sidebar-bg {
      background-color: #004b85;
    }

    .nav-link {
      color: rgba(255, 255, 255, 0.7);
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: #005a9e;
      color: white;
    }
  </style>
</head>

<body class="font-sans antialiased">
  <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
      class="fixed inset-y-0 left-0 z-30 w-64 sidebar-bg text-white transition-transform duration-300 ease-in-out transform lg:translate-x-0 lg:static lg:inset-0">
      <div class="flex items-center justify-center p-4 border-b border-white/10">
        <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-16 h-16">
      </div>

      <nav class="mt-4 px-2">
        <a href="{{ route('verifikator.dashboard') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('verifikator.dashboard') || request()->routeIs('verifikator.pengaduan.*') ? 'active' : '' }}">
          <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08H4.125A2.25 2.25 0 001.875 6.108v11.785c0 1.135.845 2.098 1.976 2.192l.112.008h12.148a2.25 2.25 0 002.25-2.25v-2.121" />
          </svg>
          <span>Daftar Pengaduan</span>
        </a>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
          @csrf
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
            class="flex items-center px-4 py-2.5 rounded-md nav-link">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            <span>Logout</span>
          </a>
        </form>
      </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <header class="flex justify-between items-center p-4 bg-white border-b">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
        <div class="font-bold text-xl text-gray-700">HALAMAN VERIFIKATOR</div>
        <div class="flex items-center space-x-3">
          <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="text-gray-700 font-medium">Hi, {{ Auth::user()->name }}</span>
        </div>
      </header>

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        @if (session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif
        @yield('content')
      </main>
    </div>
  </div>
</body>

</html>