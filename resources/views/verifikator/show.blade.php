@extends('layouts.verifikator')

@section('content')
  <div class="space-y-6">
    <!-- Panel Aksi Verifikasi -->
    @if($pengaduan->status == 'Baru')
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b bg-yellow-50">
      <h2 class="text-lg font-bold text-yellow-800">Tindakan Verifikasi</h2>
      <p class="text-sm text-yellow-700">Pengaduan ini menunggu tindakan Anda.</p>
    </div>
    <div class="p-6">
      <form action="{{ route('verifikator.pengaduan.verifikasi', $pengaduan) }}" method="POST">
      @csrf
      <div>
      <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan/Alasan Verifikasi (Wajib diisi
      jika menolak)</label>
      <textarea name="catatan" id="catatan" rows="3"
      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('catatan') }}</textarea>
      @error('catatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div class="mt-4 flex items-center justify-end space-x-4">
      <button type="submit" name="action" value="tolak"
      class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition-colors">
      Tolak Pengaduan
      </button>
      <button type="submit" name="action" value="terima"
      class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition-colors">
      Terima & Proses Pengaduan
      </button>
      </div>
      </form>
    </div>
    </div>
    @else
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
    <p class="font-bold">Informasi</p>
    <p>Pengaduan ini sudah diverifikasi dengan status: <span class="font-bold">{{$pengaduan->status}}</span></p>
    </div>
    @endif

    <!-- Detail Pengaduan -->
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      Detail Pengaduan #{{ $pengaduan->kode_pengaduan }}
    </div>
    <div class="p-6 space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
      <div><strong class="text-gray-500 block">Nama Terduga:</strong> {{ $pengaduan->nama_terduga }}</div>
      <div><strong class="text-gray-500 block">Jabatan:</strong> {{ $pengaduan->jabatan_terduga ?? '-' }}</div>
      <div><strong class="text-gray-500 block">Unit Kerja:</strong> {{ $pengaduan->unit_kerja }}</div>
      <div><strong class="text-gray-500 block">Tanggal Laporan:</strong>
        {{ $pengaduan->created_at->isoFormat('dddd, D MMMM YYYY') }}</div>
      <div><strong class="text-gray-500 block">Email Pelapor:</strong> {{ $pengaduan->email_pelapor }}</div>
      <div><strong class="text-gray-500 block">Info Pelapor:</strong> {{ Str::ucfirst($pengaduan->info_pelapor) }}
      </div>
      </div>
      <div>
      <strong class="text-gray-500 block">Uraian Pengaduan:</strong>
      <p class="mt-1 text-gray-800">{{ $pengaduan->uraian_pengaduan }}</p>
      </div>
      @if($pengaduan->dokumen_path)
      <div>
      <strong class="text-gray-500 block">Dokumen Pendukung:</strong>
      <a href="{{ asset('storage/' . $pengaduan->dokumen_path) }}" target="_blank"
      class="text-blue-600 hover:underline">Lihat Dokumen</a>
      </div>
    @endif
    </div>
    </div>

    <!-- Riwayat / Tracking -->
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700">
      Riwayat Tindak Lanjut
    </div>
    <div class="p-4">
      <table class="min-w-full border">
      <thead class="bg-gray-50">
        <tr>
        <th class="p-2 border text-left text-sm w-1/4">Tanggal</th>
        <th class="p-2 border text-left text-sm">Deskripsi & Catatan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengaduan->tindak_lanjuts->sortByDesc('created_at') as $tindak_lanjut)
      <tr class="border-t">
      <td class="p-2 border align-top text-sm">
        {{ $tindak_lanjut->created_at->translatedFormat('l, d F Y - H:i') }}
      </td>
      <td class="p-2 border align-top text-sm">
        <p class="font-semibold">{{ $tindak_lanjut->deskripsi }}</p>
        @if($tindak_lanjut->catatan_administrator)
      <div class="mt-2 p-2 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 text-xs">
      <strong>Catatan Verifikator:</strong>
      <p class="whitespace-pre-wrap">{{ $tindak_lanjut->catatan_administrator }}</p>
      </div>
      @endif
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    </div>
  </div>
@endsection