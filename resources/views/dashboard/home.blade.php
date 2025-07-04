@extends('layouts.app')

@section('content')

<div class="bg-white shadow-md rounded-lg p-6 space-y-4">
  <h1 class="text-2xl font-bold text-[#004b85]">Selamat datang, di Whistleblowing System Pemerintah Kabupaten
    Banjarnegara</h1>
  <p>Sistem Whistleblowing adalah aplikasi yang disediakan oleh Pemerintah Kabupaten Banjarnegara untuk masyarakat
    melapor pelanggaran.</p>
  <p><strong>MENJAGA KERAHASIAAN IDENTITAS ANDA</strong> adalah komitmen kami.</p> <a href="#"
    class="inline-block bg-[#005a9e] text-white rounded-full px-4 py-2 mt-2">Buat Pengaduan Baru</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6"> <a href="#"
    class="flex flex-col items-center bg-white shadow rounded p-4"> <img src="{{ asset('images/alur.png') }}"
      class="w-12 h-12 mb-2" alt="Alur"> <span>Alur</span> </a> <a href="#"
    class="flex flex-col items-center bg-white shadow rounded p-4"> <img src="{{ asset('images/unsur.png') }}"
      class="w-12 h-12 mb-2" alt="Unsur"> <span>Unsur</span> </a> <!-- Tambah menu lainnya sesuai desain --> </div>
@endsection