@extends('layouts.admin')

@section('content')
  <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">
    Dashboard Administrator
  </h1>

  <!-- Bagian Statistik (sekarang menjadi link) -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Total Semua -->
    <a href="{{ route('admin.dashboard') }}"
    class="block p-6 bg-gradient-to-br from-gray-700 to-gray-800 text-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300 {{ !$statusFilter ? 'ring-4 ring-offset-2 ring-gray-400' : '' }}">
    <h2 class="text-sm font-semibold uppercase text-gray-300">Total Pengaduan</h2>
    <p class="text-3xl font-bold mt-1">{{ $totalSemua }}</p>
    </a>
    <!-- Baru -->
    <a href="{{ route('admin.dashboard', ['status' => 'Baru']) }}"
    class="block p-6 bg-gradient-to-br from-yellow-400 to-yellow-500 text-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300 {{ $statusFilter == 'Baru' ? 'ring-4 ring-offset-2 ring-yellow-300' : '' }}">
    <h2 class="text-sm font-semibold uppercase">Baru</h2>
    <p class="text-3xl font-bold mt-1">{{ $totalBaru }}</p>
    </a>
    <!-- Diproses -->
    <a href="{{ route('admin.dashboard', ['status' => 'Diproses']) }}"
    class="block p-6 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300 {{ $statusFilter == 'Diproses' ? 'ring-4 ring-offset-2 ring-blue-300' : '' }}">
    <h2 class="text-sm font-semibold uppercase">Diproses</h2>
    <p class="text-3xl font-bold mt-1">{{ $totalDiproses }}</p>
    </a>
    <!-- Selesai -->
    <a href="{{ route('admin.dashboard', ['status' => 'Selesai']) }}"
    class="block p-6 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300 {{ $statusFilter == 'Selesai' ? 'ring-4 ring-offset-2 ring-green-300' : '' }}">
    <h2 class="text-sm font-semibold uppercase">Selesai</h2>
    <p class="text-3xl font-bold mt-1">{{ $totalSelesai }}</p>
    </a>
    <!-- Ditolak -->
    <a href="{{ route('admin.dashboard', ['status' => 'Ditolak']) }}"
    class="block p-6 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-lg shadow-lg transform hover:-translate-y-1 transition-transform duration-300 {{ $statusFilter == 'Ditolak' ? 'ring-4 ring-offset-2 ring-red-300' : '' }}">
    <h2 class="text-sm font-semibold uppercase">Ditolak</h2>
    <p class="text-3xl font-bold mt-1">{{ $totalDitolak }}</p>
    </a>
  </div>

  <!-- Tabel Pengaduan -->
  <div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-bold text-[#004b85] mb-4">{{ $judulTabel }}</h2>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border">
      {{-- Header Tabel (tetap sama) --}}
      <tbody class="divide-y divide-gray-200">
      @forelse ($semuaPengaduan as $pengaduan)
      <tr>
        {{-- Kolom Data (tetap sama) --}}
        <td class="px-4 py-2 whitespace-nowrap text-sm">
        {{-- Ini kode untuk status badge, salin dari view verifikator atau buat ulang --}}
        @if ($pengaduan->status == 'Baru')
      <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Baru</span>
      @elseif ($pengaduan->status == 'Diproses')
      <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
      @elseif ($pengaduan->status == 'Selesai')
      <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
      @else
      <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
      @endif
        </td>
       <td class="px-4 py-2 whitespace-nowrap text-sm text-right">
  <a href="{{ route('admin.pengaduan.show', $pengaduan) }}"
     class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-md text-xs font-semibold hover:bg-indigo-200 transition">
     Detail
  </a>
</td>

      </tr>
    @empty
      <tr>
      <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada pengaduan dengan status ini.</td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>
    <div class="mt-6">
    {{ $semuaPengaduan->links() }}
    </div>
  </div>
@endsection