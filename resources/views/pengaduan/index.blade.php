@extends('layouts.app')

@section('content')
  <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
    <h1 class="text-2xl md:text-3xl font-bold text-[#004b85] mb-6">
    Data Pengaduan Saya
    </h1>

    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Pengaduan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Terduga</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      @forelse ($pengaduans as $index => $pengaduan)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
        <td class="px-6 py-4 whitespace-nowrap font-mono">{{ $pengaduan->kode_pengaduan }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $pengaduan->nama_terduga }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
        @if ($pengaduan->status == 'Baru')
      <span
        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
        Menunggu Verifikasi
      </span>
      @elseif ($pengaduan->status == 'Diproses')
      <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
        Diproses
      </span>
      @elseif ($pengaduan->status == 'Selesai')
      <span
        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
        Selesai
      </span>
      @else
      <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
        Ditolak
      </span>
      @endif
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
        {{-- Ganti '#' dengan link detail jika sudah ada --}}
        <a href="{{ route('pengaduan.show', $pengaduan) }}"
        class="text-white bg-[#005a9e] hover:bg-[#004b85] font-semibold rounded-md px-4 py-2 text-sm transition-colors duration-300">
        Detail
        </a>
        </td>
      </tr>
    @empty
      <tr>
      <td colspan="5" class="px-6 py-4 text-center text-gray-500">
      Anda belum memiliki data pengaduan.
      </td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>
  </div>
@endsection