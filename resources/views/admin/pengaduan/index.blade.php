@extends('layouts.admin')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl md:text-3xl font-bold" style="color: #004F98;">Kelola Pengaduan</h1>
  </div>

  <!-- Form Filter dan Pencarian -->
  <div class="bg-white rounded-lg shadow-md p-4 mb-6">
    <form action="{{ route('admin.pengaduan.index') }}" method="GET"
    class="flex flex-col md:flex-row md:items-center gap-4">
    <div class="flex flex-col md:flex-row flex-grow gap-4">
      <input type="text" name="search" placeholder="Cari kode, terduga, uraian..."
      class="w-full md:w-80 border-gray-300 rounded-md shadow-sm" value="{{ request('search') }}">
      <select name="status" class="w-full md:w-48 border-gray-300 rounded-md shadow-sm">
      <option value="">Semua Status</option>
      @foreach ($statuses as $status)
      <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
      {{ $status }}
      </option>
    @endforeach
      </select>
    </div>

    <div class="flex items-center space-x-2">
      <button type="submit"
      class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors">Filter</button>
      <a href="{{ route('admin.pengaduan.index') }}"
      class="w-full md:w-auto px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 transition-colors">Reset</a>
    </div>
    </form>
  </div>

  <!-- Tabel Pengaduan -->
  <div class="bg-white rounded-lg shadow-md">
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelapor & Tanggal</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Uraian Pengaduan</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      @forelse ($pengaduans as $pengaduan)
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm">
        <div class="font-bold text-gray-900">{{ $pengaduan->user->name ?? 'Pelapor Anonim' }}</div>
        <div class="text-gray-500">{{ $pengaduan->created_at->isoFormat('D MMM YYYY, HH:mm') }}</div>
        </td>
        <td class="px-4 py-3 text-sm text-gray-800">
        <div class="font-semibold">{{ $pengaduan->nama_terduga }}</div>
        <p class="text-gray-600 mt-1 truncate max-w-sm">{{ $pengaduan->uraian_pengaduan }}</p>
        </td>
        <td class="px-4 py-3 whitespace-nowrap text-sm">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
      @if ($pengaduan->status == 'Baru') bg-yellow-100 text-yellow-800
      @elseif ($pengaduan->status == 'Diproses') bg-blue-100 text-blue-800
      @elseif ($pengaduan->status == 'Selesai') bg-green-100 text-green-800
      @else bg-red-100 text-red-800 @endif">
        {{ $pengaduan->status }}
        </span>
        </td>
        <td class="px-4 py-3 whitespace-nowrap text-sm">
        <a href="{{ route('admin.pengaduan.show', $pengaduan) }}"
        class="inline-block px-3 py-1.5 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition">
        Lihat Detail
        </a>

        </td>
      </tr>
    @empty
      <tr>
      <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data pengaduan yang cocok.</td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>
    <div class="p-4 border-t">
    {{ $pengaduans->links() }}
    </div>
  </div>
@endsection