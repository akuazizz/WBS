@extends('layouts.app')

@section('content')
  <div class="space-y-6" x-data="{ showModal: false }">

    {{-- Header Halaman --}}
    <div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-xl md:text-2xl font-bold text-gray-800">
      Detail Pengaduan: <span class="text-[#005a9e] font-mono">{{ $pengaduan->kode_pengaduan }}</span>
    </h1>
    <p class="text-sm text-gray-600 mt-1">
      Tentang {{ $pengaduan->judul_pengaduan ?? 'Praktik Pelanggaran' }}
    </p>
    </div>

    {{-- Detail Terduga --}}
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      <i class="fas fa-user mr-2 text-gray-500"></i> Terduga
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-y-4 gap-x-6 text-sm">
      <div><strong class="text-gray-500 block">Nama:</strong> {{ $pengaduan->nama_terduga }}</div>
      <div><strong class="text-gray-500 block">Jabatan:</strong> {{ $pengaduan->jabatan_terduga ?? '-' }}</div>
      <div><strong class="text-gray-500 block">Unit Kerja:</strong> {{ $pengaduan->unit_kerja }}</div>
    </div>
    </div>

    {{-- Uraian Pengaduan & Informasi Laporan --}}
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      <i class="fas fa-file-alt mr-2 text-gray-500"></i> Uraian Pengaduan
    </div>
    <div class="p-6 text-sm space-y-4">
      <p class="text-gray-800 whitespace-pre-wrap">{{ $pengaduan->uraian_pengaduan }}</p>
      @if($pengaduan->dokumen_path)
      <div>
      <strong class="text-gray-500">Lampiran:</strong>
      <a href="{{ asset('storage/' . $pengaduan->dokumen_path) }}" target="_blank"
      class="text-blue-600 hover:underline ml-1">
      Lihat Lampiran
      </a>
      </div>
    @endif
      <p class="text-xs text-gray-500 pt-2 border-t mt-4">
      Dilaporkan pada: {{ $pengaduan->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm') }} WIB
      </p>
    </div>
    </div>

    {{-- BAGIAN TRACKING --}}
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      <i class="fas fa-shoe-prints mr-2 text-gray-500"></i> Tracking Riwayat Pengaduan
    </div>
    <div class="p-4 md:p-6">
      <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-2">
      {{-- Gunakan sortBy untuk memastikan urutan riwayat benar --}}
      @foreach($pengaduan->tindak_lanjuts->sortBy('created_at') as $tindak_lanjut)
      <li class="mb-10 ml-6">
        <span
        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white">
        <svg class="w-3 h-3 text-blue-800" fill="currentColor" viewBox="0 0 20 20">
        <path
        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4z" />
        </svg>
        </span>

        {{-- === INI PERBAIKAN UTAMANYA === --}}
        {{-- Ambil tanggal dari '$tindak_lanjut', bukan '$pengaduan' --}}
        <h3 class="flex items-center mb-1 text-md font-semibold text-gray-900">
        {{ $tindak_lanjut->deskripsi }}
        </h3>
        <time class="block mb-2 text-sm font-normal leading-none text-gray-500">
        {{ $tindak_lanjut->created_at->translatedFormat('l, d F Y - H:i') }} WIB
        </time>
        {{-- ============================== --}}

        @if($tindak_lanjut->catatan_administrator)
      <div class="mt-2 p-3 text-sm bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 rounded-r-lg">
      <strong class="block">Catatan Administrator:</strong>
      <p class="mt-1 whitespace-pre-wrap">{{ $tindak_lanjut->catatan_administrator }}</p>
      </div>
      @endif

        {{-- Tampilkan tombol hanya jika statusnya meminta tindak lanjut dan ini adalah riwayat terakhir --}}
        @if($pengaduan->status == 'Belum ditindaklanjuti Pelapor' && $loop->last)
      <div class="mt-4 p-3 bg-red-50 border border-red-200 text-red-800 rounded-md">
      <p class="font-bold text-red-900">Aksi Diperlukan:</p>
      <p class="mb-3">Mohon untuk melengkapi/menindaklanjuti catatan dari administrator.</p>
      <button @click="showModal = true"
        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm font-semibold">
        <i class="fas fa-plus-circle mr-1"></i> Tindak Lanjuti Catatan
      </button>
      </div>
      @endif
      </li>
    @endforeach
      </ol>
    </div>
    </div>


    {{-- Modal untuk Form Tindak Lanjut --}}
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" style="display: none;">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg" @click.away="showModal = false">
      <div class="p-4 border-b">
      <h3 class="text-lg font-bold">Formulir Tindak Lanjut</h3>
      </div>
      <form action="{{ route('pengaduan.tindaklanjut.store', $pengaduan) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="p-6 space-y-4">
        <div>
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Tindak Lanjut</label>
        <textarea id="deskripsi" name="deskripsi" rows="5"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
          required placeholder="Jelaskan tindak lanjut atau informasi tambahan Anda di sini..."></textarea>
        </div>
        <div>
        <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampirkan Bukti Pendukung
          (Opsional)</label>
        <input type="file" id="lampiran" name="lampiran"
          class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        </div>
      </div>
      <div class="flex justify-end space-x-3 p-4 bg-gray-50 rounded-b-lg">
        <button type="button" @click="showModal = false"
        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Batal</button>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Kirim Tindak
        Lanjut</button>
      </div>
      </form>
    </div>
    </div>

  </div>
@endsection