<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} - WBS</title>

  <!-- Scripts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

      <nav class="mt-4 px-2 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
          <span>Dashboard</span>
        </a>
        <!-- Manajemen User -->
        <a href="{{ route('admin.users.index') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
          <span>Manajemen User</span>
        </a>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" class="mt-8 pt-4 border-t border-white/10">
          @csrf
          <button type="submit" class="w-full flex items-center px-4 py-2.5 rounded-md nav-link">
            <svg class="w-6 h-6 mr-3" ...><!-- ikon logout --></svg>
            <span>Logout</span>
          </button>
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
        <div class="font-bold text-xl text-gray-700">HALAMAN ADMINISTRATOR</div>
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