@extends('layouts.admin')

@section('content')
  <div class="space-y-6">
    @if(!in_array($pengaduan->status, ['Selesai', 'Ditolak']))
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b bg-gray-50">
      <h2 class="text-lg font-bold text-gray-800">Tindakan Administrator</h2>
      <p class="text-sm text-gray-600">Perbarui status pengaduan sebagai Administrator.</p>
    </div>
    <div class="p-6">
      <form action="{{ route('admin.pengaduan.verifikasi', $pengaduan) }}" method="POST">
      @csrf
      <div>
      <label for="catatan" class="block text-sm font-medium text-gray-700">
      Catatan/Keterangan Tindak Lanjut (Wajib diisi jika menolak)
      </label>
      <textarea name="catatan" id="catatan" rows="3"
      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      placeholder="Contoh: Pengaduan diteruskan ke tim investigasi.">{{ old('catatan') }}</textarea>
      @error('catatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="mt-4 flex flex-wrap items-center justify-end gap-3">
      {{-- Admin bisa menolak kapan saja selama belum final --}}
      <button type="submit" name="action" value="tolak"
      class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition-colors">
      Tolak Pengaduan
      </button>

      {{-- Admin bisa memproses kapan saja selama masih 'Baru' --}}
      @if($pengaduan->status == 'Baru')
      <button type="submit" name="action" value="terima"
      class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors">
      Terima & Proses
      </button>
      @endif

      {{-- Admin bisa menyelesaikan kapan saja selama belum final --}}
      <button type="submit" name="action" value="selesai"
      class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition-colors">
      Tandai Selesai
      </button>
      </div>
      </form>
    </div>
    </div>
    @else
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md" role="alert">
    <p class="font-bold">Informasi</p>
    <p>Pengaduan ini telah selesai ditindaklanjuti dengan status akhir: <span
      class="font-bold">{{ $pengaduan->status }}</span>.</p>
    </div>
    @endif

    <!-- Detail Pengaduan -->
    <div class="bg-white rounded-lg shadow-md">
    <div class="p-4 border-b font-semibold text-gray-700 flex justify-between items-center">
      <span>Detail Pengaduan #{{ $pengaduan->kode_pengaduan }}</span>
      <span class="px-3 py-1 text-sm font-bold rounded-full
      @if ($pengaduan->status == 'Baru') bg-yellow-100 text-yellow-800
      @elseif ($pengaduan->status == 'Diproses') bg-blue-100 text-blue-800
    @elseif ($pengaduan->status == 'Selesai') bg-green-100 text-green-800
    @else bg-red-100 text-red-800 @endif">
      {{ $pengaduan->status }}
      </span>
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
      <p class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $pengaduan->uraian_pengaduan }}</p>
      </div>
      @if($pengaduan->dokumen_path)
      <div>
      <strong class="text-gray-500 block">Dokumen Pendukung:</strong>
      <a href="{{ asset('storage/' . $pengaduan->dokumen_path) }}" target="_blank"
      class="text-blue-600 hover:underline flex items-center gap-1 mt-1">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd"
        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
        clip-rule="evenodd" />
      </svg>
      Lihat & Unduh Dokumen
      </a>
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
      <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-2">
      @forelse($pengaduan->tindak_lanjuts->sortBy('created_at') as $tindak_lanjut)
      <li class="mb-8 ml-6">
        <span
        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white">
        <svg class="w-3 h-3 text-blue-800" fill="currentColor" viewBox="0 0 20 20">
        <path
        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4z" />
        </svg>
        </span>
        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">{{ $tindak_lanjut->deskripsi }}</h3>
        <time
        class="block mb-2 text-sm font-normal leading-none text-gray-400">{{ $tindak_lanjut->created_at->translatedFormat('l, d F Y - H:i') }}</time>
        @if($tindak_lanjut->catatan_administrator)
      <p class="p-3 text-sm italic border border-gray-200 rounded-lg bg-gray-50 whitespace-pre-wrap">
      {{ $tindak_lanjut->catatan_administrator }}
      </p>
      @endif
      </li>
    @empty
      <li class="ml-6 text-gray-500">Belum ada tindak lanjut.</li>
    @endforelse
      </ol>
    </div>
    </div>
  </div>
@endsection