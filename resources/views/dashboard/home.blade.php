@extends('layouts.app')

@section('content')

  {{-- Bagian Welcome Card --}}
  <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
    <h1 class="text-2xl md:text-3xl font-bold text-[#004b85]">
    Selamat datang, di Whistleblowing System Pemerintah Kabupaten Banjarnegara
    </h1>
    <p class="mt-4 text-gray-600 leading-relaxed">
    Sistem Whistleblowing merupakan sebuah aplikasi yang disediakan oleh Pemerintah Kabupaten Banjarnegara bagi
    masyarakat yang memiliki informasi serta ingin melaporkan dugaan pelanggaran yang terjadi di lingkungan Pemerintah
    Kabupaten Banjarnegara.
    </p>
    <p class="mt-4 text-gray-600 leading-relaxed">
    Anda tidak perlu khawatir mengenai kerahasiaan identitas, karena Pemerintah Kabupaten Banjarnegara akan <strong
      class="text-gray-800">MENJAGA KERAHASIAAN IDENTITAS ANDA</strong> sebagai whistleblower. Pemerintah Kabupaten
    Banjarnegara sangat menghargai setiap informasi yang disampaikan, dengan penekanan pada substansi laporan yang Anda
    berikan.
    </p>

    <a href="{{ route('pengaduan.create') }}"
    class="inline-block bg-[#005a9e] hover:bg-[#004b85] text-white font-semibold rounded-md px-6 py-3 mt-8 transition-colors duration-300 shadow hover:shadow-lg">
    Buat Pengaduan Baru
    </a>
  </div>

  {{-- Grid Menu --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">

    {{-- Item Menu 1: Alur --}}
    <a href="{{ route('home') }}#alur" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-alur.png') }}" class="w-16 h-16 mb-4" alt="Alur Icon">
    <span class="font-semibold text-lg text-gray-700 group-hover:text-[#005a9e]">Alur</span>
    </a>

    {{-- Item Menu 2: Unsur --}}
    <a href="{{ route('home') }}#unsur" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-unsur.png') }}" class="w-16 h-16 mb-4" alt="Unsur Icon">
    <span class="font-semibold text-lg text-gray-700 group-hover:text-[#005a9e]">Unsur</span>
    </a>

    {{-- Item Menu 3: FAQ --}}
    <a href="{{ route('home') }}#faq" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-FAQ.png') }}" class="w-16 h-16 mb-4" alt="FAQ Icon">
    <span class="font-semibold text-lg text-gray-700 group-hover:text-[#005a9e]">FAQ</span>
    </a>

    {{-- Item Menu 4: Kerahasiaan Pelapor --}}
    <a href="{{ route('home') }}#kerahasiaan" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-kerahasiaan.png') }}" class="w-16 h-16 mb-4" alt="Kerahasiaan Icon">
    <span class="font-semibold text-lg text-center text-gray-700 group-hover:text-[#005a9e]">Kerahasiaan Pelapor</span>
    </a>

    {{-- Item Menu 5: Cara Melapor --}}
    <a href="{{ route('home') }}#cara-melapor" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-melapor.png') }}" class="w-16 h-16 mb-4" alt="Cara Melapor Icon">
    <span class="font-semibold text-lg text-gray-700 group-hover:text-[#005a9e]">Cara Melapor</span>
    </a>

    {{-- Item Menu 6: Kontak Kami --}}
    <a href="{{ route('home') }}#kontak" target="_blank"
    class="group flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-200">
    {{-- Ganti dengan path ikon Anda --}}
    <img src="{{ asset('images/icon-kami.png') }}" class="w-16 h-16 mb-4" alt="Kontak Icon">
    <span class="font-semibold text-lg text-gray-700 group-hover:text-[#005a9e]">Kontak Kami</span>
    </a>

  </div>

@endsection