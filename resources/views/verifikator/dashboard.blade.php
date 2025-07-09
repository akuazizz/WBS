@extends('layouts.verifikator')

@section('content')
  <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
    <h1 class="text-2xl md:text-3xl font-bold text-[#004b85] mb-6">
      Daftar Pengaduan Masuk
    </h1>

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
                @if ($pengaduan->status == 'Baru')
                  <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Baru</span>
                @elseif ($pengaduan->status == 'Diproses')
                  <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
                @elseif ($pengaduan->status == 'Selesai')
                  <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                @else
                  <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                @endif
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
                Tidak ada data pengaduan yang perlu diverifikasi.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      {{ $pengaduans->links() }}
    </div>
  </div>
@endsection
