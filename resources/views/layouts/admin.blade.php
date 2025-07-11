<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-g">
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
    }

    .sidebar-bg {
      background-color: #004b85;
    }

    .nav-link {
      color: rgba(255, 255, 255, 0.7);
      transition: all 0.2s ease-in-out;
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
        <a href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('images/logo-wbs.png') }}" alt="Logo WBS" class="w-16 h-16">
        </a>
      </div>

      <nav class="mt-4 px-2 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
          {{-- IKON DASHBOARD --}}
          <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
          </svg>
          <span>Dashboard</span>
        </a>

        <!-- Manajemen User -->
        <a href="{{ route('admin.users.index') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
          {{-- IKON MANAJEMEN USER --}}
          <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-4.663l.005-.004c.85- .114 1.65-.317 2.37-.625 1.506- .648 2.585-1.94 2.585-3.44V6.75A2.25 2.25 0 0015 4.5v.75m0 3.75m0 0H9m6 0v.003c0 .621-.504 1.125-1.125 1.125H9.75V12h4.125c.621 0 1.125.504 1.125 1.125v.003" />
          </svg>
          <span>Manajemen User</span>
        </a>

        <!-- Kelola Pengaduan -->
        <a href="{{ route('admin.pengaduan.index') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
          {{-- IKON KELOLA PENGADUAN --}}
          <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08H4.125A2.25 2.25 0 001.875 6.108v11.785c0 1.135.845 2.098 1.976 2.192l.112.008h12.148a2.25 2.25 0 002.25-2.25v-2.121" />
          </svg>
          <span>Kelola Pengaduan</span>
        </a>

        <a href="{{ route('admin.activity.log') }}"
          class="flex items-center px-4 py-2.5 rounded-md nav-link {{ request()->routeIs('admin.activity.log') ? 'active' : '' }}">
          {{-- IKON LOG AKTIVITAS --}}
          <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span>Log Aktivitas</span>
        </a>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" class="mt-8 pt-4 border-t border-white/10">
          @csrf
          <button type="submit" class="w-full flex items-center px-4 py-2.5 rounded-md nav-link">
            <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
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
          <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="text-gray-700 font-medium">Hi, {{ Auth::user()->name }}</span>
        </div>
      </header>

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
        @if (session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif
        @if (session('error'))
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md" role="alert">
        <p>{{ session('error') }}</p>
      </div>
    @endif
        @yield('content')
      </main>
    </div>
  </div>
</body>

</html>