@extends('layouts.app')

@section('content')
  <div class="space-y-6" x-data="{ showModal: false }">

    {{-- Header Halaman --}}
    <div class="bg-white rounded-lg shadow-md p-4">
    <h1 class="text-xl font-bold text-gray-800">
      Detail Pengaduan dengan Kode <span class="text-[#005a9e]">{{ $pengaduan->kode_pengaduan }}</span>
    </h1>
    <p class="text-sm text-gray-600 mt-1">Tentang {{ $pengaduan->judul_pengaduan ?? 'Praktik Pelanggaran' }}</p>
    </div>

    {{-- Detail Terduga --}}
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      <i class="fas fa-user mr-2"></i> Terduga
    </div>
    <div class="p-4 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
      <div><strong class="text-gray-500">Nama:</strong> {{ $pengaduan->nama_terduga }}</div>
      <div><strong class="text-gray-500">Jabatan:</strong> {{ $pengaduan->jabatan_terduga ?? '-' }}</div>
      <div><strong class="text-gray-500">Unit Kerja:</strong> {{ $pengaduan->unit_kerja }}</div>
    </div>
    </div>

    {{-- Uraian Pengaduan & Tracking --}}
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      <i class="fas fa-file-alt mr-2"></i> Uraian Pengaduan
    </div>
    <div class="p-4 text-sm space-y-4">
      <p>{{ $pengaduan->uraian_pengaduan }}</p>
      @if($pengaduan->dokumen_path)
      <ul>
      <li><strong>Lampiran:</strong>
      <a href="{{ asset('storage/' . $pengaduan->dokumen_path) }}" target="_blank"
      class="text-blue-600 hover:underline">Lihat Lampiran</a>
      </li>
      </ul>
    @endif
      <p classd="text-xs text-gray-500">Diliput: {{ $pengaduan->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm') }} WIB
      </p>
    </div>

    {{-- BAGIAN TRACKING --}}
    <div class="p-4 border-t font-semibold text-gray-700">
      <i class="fas fa-shoe-prints mr-2"></i> Tracking
    </div>
    <div class="p-4">
      <table class="min-w-full border">
      <thead class="bg-gray-50">
        <tr>
        <th class="p-2 border text-left text-sm">Tanggal</th>
        <th class="p-2 border text-left text-sm">Status</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        @foreach($pengaduan->tindak_lanjuts as $tindak_lanjut)
      <tr>
      <td class="p-2 border align-top w-1/4">
        {{ $pengaduan->created_at->translatedFormat('l, d F Y \p\u\k\u\l H:i') }}
      <td class="p-2 border align-top">
        <p class="font-semibold">{{ $tindak_lanjut->deskripsi }}</p>
        @if($tindak_lanjut->catatan_administrator)
      <div class="mt-2 p-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700">
      <strong>Catatan Administrator:</strong>
      <p>{{ $tindak_lanjut->catatan_administrator }}</p>
      </div>
      @endif
        {{-- Tampilkan tombol hanya jika statusnya meminta tindak lanjut --}}
        @if($pengaduan->status == 'Belum ditindaklanjuti Pelapor' && $loop->last)
      <div class="mt-3 p-3 bg-red-50 border border-red-200 text-red-800 rounded-md">
      <p class="font-bold">Status Catatan:</p>
      <p class="mb-3">Mohon untuk melengkapi/menindaklanjuti catatan dari administrator.</p>
      <button @click="showModal = true"
      class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
      <i class="fas fa-plus-circle mr-1"></i> Tindaklanjuti Catatan
      </button>
      </div>
      @endif
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    </div>

    {{-- Modal untuk Form Tindak Lanjut --}}
    <div x-show="showModal" x-transition
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-lg" @click.away="showModal = false">
      <h3 class="text-lg font-bold mb-4">Formulir Tindak Lanjut</h3>
      <form action="{{ route('pengaduan.tindaklanjut.store', $pengaduan) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="space-y-4">
        <div>
        <label for="deskripsi" class="block text-sm font-medium">Deskripsi Tindak Lanjut</label>
        <textarea id="deskripsi" name="deskripsi" rows="5"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
        </div>
        <div>
        <label for="lampiran" class="block text-sm font-medium">Lampirkan Bukti Pendukung</label>
        <input type="file" id="lampiran" name="lampiran" class="mt-1 block w-full text-sm">
        </div>
        <div class="flex justify-end space-x-3 pt-4">
        <button type="button" @click="showModal = false"
          class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</button>
        <button type="submit"
          class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Simpan</button>
        </div>
      </div>
      </form>
    </div>
    </div>
  </div>
@endsection