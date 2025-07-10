@extends('layouts.verifikator')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-[#004b85]">Daftar Pengaduan Masuk</h1>
  </div>

  {{-- ========================================================== --}}
  {{-- ▼▼▼ FORM FILTER DAN PENCARIAN DITAMBAHKAN DI SINI ▼▼▼ --}}
  {{-- ========================================================== --}}
  <div class="bg-white rounded-lg shadow-md p-4 mb-6">
    {{-- Action form menunjuk ke route 'verifikator.dashboard' --}}
    <form action="{{ route('verifikator.dashboard') }}" method="GET"
    class="flex flex-col md:flex-row md:items-center gap-4">
    {{-- Grup Input Kiri --}}
    <div class="flex flex-col md:flex-row flex-grow gap-4">
      <input type="text" name="search" placeholder="Cari kode, terduga..."
      class="w-full md:w-80 border-gray-300 rounded-md shadow-sm" value="{{ request('search') }}">
      <select name="status" class="w-full md:w-48 border-gray-300 rounded-md shadow-sm">
      <option value="">Semua Status</option>
      {{-- Variabel $statuses sekarang tersedia dari controller --}}
      @foreach ($statuses as $status)
      <option value="{{ $status }}" @if(request('status') == $status) selected @endif>
      {{ $status }}
      </option>
    @endforeach
      </select>
    </div>

    {{-- Grup Tombol Kanan --}}
    <div class="flex items-center space-x-2">
      <button type="submit"
      class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors">Filter</button>
      {{-- Tombol reset juga menunjuk ke route 'verifikator.dashboard' --}}
      <a href="{{ route('verifikator.dashboard') }}"
      class="w-full md:w-auto px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 transition-colors">Reset</a>
    </div>
    </form>
  </div>
  {{-- ========================================================== --}}
  {{-- ▲▲▲ AKHIR DARI BAGIAN FORM FILTER ▲▲▲ --}}
  {{-- ========================================================== --}}

  <!-- Tabel Pengaduan -->
  <div class="bg-white rounded-lg shadow-md">
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Terduga</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      @forelse ($pengaduans as $index => $pengaduan)
      <tr>
      <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduans->firstItem() + $index }}</td>
      <td class="px-6 py-4 whitespace-nowrap font-mono">{{ $pengaduan->kode_pengaduan }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->created_at->isoFormat('D MMM YYYY') }}</td>
      <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->nama_terduga }}</td>
      <td class="px-6 py-4 whitespace-nowrap">
      <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
        @if ($pengaduan->status == 'Baru') bg-yellow-100 text-yellow-800
      @elseif ($pengaduan->status == 'Diproses') bg-blue-100 text-blue-800
      @elseif ($pengaduan->status == 'Selesai') bg-green-100 text-green-800
      @else bg-red-100 text-red-800 @endif">
        {{ $pengaduan->status }}
      </span>
      </td>
      <td class="px-6 py-4 whitespace-nowrap">
      <a href="{{ route('verifikator.pengaduan.show', $pengaduan) }}"
        class="inline-block px-3 py-1.5 text-sm font-medium text-white bg-[#005a9e] rounded-md hover:bg-[#004b85] transition">
        Verifikasi
      </a>
      </td>
      </tr>
    @empty
      <tr>
      <td colspan="6" class="px-6 py-4 text-center text-gray-500">
      Tidak ada data pengaduan yang cocok dengan filter.
      </td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>

    <div class="mt-6 p-4 border-t">
    {{-- Menambahkan withQueryString() agar filter tidak hilang saat ganti halaman --}}
    {{ $pengaduans->withQueryString()->links() }}
    </div>
  </div>
@endsection