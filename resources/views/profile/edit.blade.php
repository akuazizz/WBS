@extends('layouts.app')

@section('content')
    {{-- Inisialisasi Alpine.js untuk mengontrol semua modal --}}
    <div x-data="{
                    showAkunModal: false,
                    showPribadiModal: false,
                    showFotoModal: false,
                    photoPreview: null
                 }" class="space-y-8">

        {{-- Notifikasi Sukses --}}
        @if (session('status') === 'profile-updated')
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>Profil Anda telah berhasil diperbarui.</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                <p class="font-bold">Oops! Terjadi kesalahan:</p>
                <ul class="list-disc list-inside mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ========================================================== --}}
        {{-- ▼▼▼ FORM UTAMA DIMULAI DI SINI, MEMBUNGKUS SEMUANYA ▼▼▼ --}}
        {{-- ========================================================== --}}
        <form id="profile-update-form" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            {{-- Bagian Foto Profil --}}
            <div class="bg-[#005a9e] rounded-lg shadow-lg p-8 flex flex-col items-center text-white">
                <div class="w-32 h-32 rounded-full bg-white/30 flex items-center justify-center border-4 border-white">
                    {{-- Menampilkan foto profil saat ini atau preview foto baru --}}
                    <span x-show="!photoPreview"
                        class="inline-block w-full h-full rounded-full bg-cover bg-no-repeat bg-center"
                        style="background-image: url('{{ Auth::user()->profile_photo_url }}');">
                    </span>
                    <span x-show="photoPreview"
                        class="inline-block w-full h-full rounded-full bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                {{-- Tombol ini sekarang hanya untuk memicu pemilihan file, bukan membuka modal --}}
                <label for="photo" class="mt-4 font-semibold hover:underline focus:outline-none cursor-pointer">
                    Edit Foto Profil
                </label>
                {{-- Input file yang sebenarnya disembunyikan --}}
                <input type="file" name="photo" id="photo" class="hidden" @change="
                               const reader = new FileReader();
                               reader.onload = (e) => { photoPreview = e.target.result; };
                               reader.readAsDataURL($event.target.files[0]);
                           " />
            </div>

            {{-- Card Data Akun (Read-Only) --}}
            <div class="bg-white rounded-lg shadow-md mt-8">
                <div class="p-4 border-b flex justify-between items-center bg-gray-50 rounded-t-lg">
                    <h3 class="font-bold text-lg text-gray-700 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Data Akun
                    </h3>
                    <button type="button" @click="showAkunModal = true" class="text-gray-500 hover:text-blue-600 transition"
                        title="Edit Data Akun">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-4 text-gray-600">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Username</div>
                        <div class="col-span-2">: {{ $user->username ?? 'Belum diisi' }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Jenis Kelamin</div>
                        <div class="col-span-2">: {{ $user->jenis_kelamin ?? 'Belum diisi' }}</div>
                    </div>
                </div>
            </div>

            {{-- Card Data Pribadi (Read-Only) --}}
            <div class="bg-white rounded-lg shadow-md mt-8">
                <div class="p-4 border-b flex justify-between items-center bg-gray-50 rounded-t-lg">
                    <h3 class="font-bold text-lg text-gray-700 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                        Data Pribadi
                    </h3>
                    <button type="button" @click="showPribadiModal = true"
                        class="text-gray-500 hover:text-blue-600 transition" title="Edit Data Pribadi">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-4 text-gray-600">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Nama</div>
                        <div class="col-span-2">: {{ $user->name }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Email</div>
                        <div class="col-span-2">: {{ $user->email }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Kontak</div>
                        <div class="col-span-2">: {{ $user->kontak ?? 'Belum diisi' }}</div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1 font-semibold">Status User</div>
                        <div class="col-span-2">: <span
                                class="bg-green-200 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Simpan Perubahan (satu untuk semua) --}}
            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-md transition">
                    Simpan Semua Perubahan
                </button>
            </div>

            {{-- ======================= --}}
            {{-- AREA MODAL --}}
            {{-- ======================= --}}

            <!-- Modal Edit Data Akun -->
            <div x-show="showAkunModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                x-cloak @keydown.escape.window="showAkunModal = false">
                <div @click.away="showAkunModal = false"
                    class="bg-[#005a9e] rounded-lg shadow-xl w-full max-w-md mx-4 text-white">
                    <div class="p-4 border-b border-white/20 flex justify-between items-center">
                        <h3 class="text-xl font-bold">Edit Data Akun</h3>
                        <button type="button" @click="showAkunModal = false"
                            class="text-2xl font-bold hover:text-gray-300">×</button>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="username_akun" class="block mb-2 text-sm font-medium">Username</label>
                            <input type="text" name="username" id="username_akun"
                                value="{{ old('username', $user->username) }}"
                                class="bg-white/90 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <div>
                            <label for="jenis_kelamin_akun" class="block mb-2 text-sm font-medium">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_akun"
                                class="bg-white/90 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" @selected(old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki')>Laki-laki</option>
                                <option value="Perempuan" @selected(old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan')>Perempuan</option>
                            </select>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="button" @click="showAkunModal = false"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-md transition mr-2">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Data Pribadi -->
            <div x-show="showPribadiModal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak
                @keydown.escape.window="showPribadiModal = false">
                <div @click.away="showPribadiModal = false"
                    class="bg-[#005a9e] rounded-lg shadow-xl w-full max-w-md mx-4 text-white">
                    <div class="p-4 border-b border-white/20 flex justify-between items-center">
                        <h3 class="text-xl font-bold">Edit Data Pribadi</h3>
                        <button type="button" @click="showPribadiModal = false"
                            class="text-2xl font-bold hover:text-gray-300">×</button>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="name_pribadi" class="block mb-2 text-sm font-medium">Nama</label>
                            <input type="text" name="name" id="name_pribadi" value="{{ old('name', $user->name) }}"
                                class="bg-white/90 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                required>
                        </div>
                        <div>
                            <label for="email_pribadi" class="block mb-2 text-sm font-medium">Email</label>
                            <input type="email" name="email" id="email_pribadi" value="{{ old('email', $user->email) }}"
                                class="bg-white/90 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                required>
                        </div>
                        <div>
                            <label for="kontak_pribadi" class="block mb-2 text-sm font-medium">Kontak</label>
                            <input type="text" name="kontak" id="kontak_pribadi" value="{{ old('kontak', $user->kontak) }}"
                                class="bg-white/90 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="button" @click="showPribadiModal = false"
                                class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-md transition mr-2">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </form> {{-- FORM UTAMA BERAKHIR DI SINI --}}

        {{-- Tombol Logout (di luar form utama) --}}
        <div class="text-center pt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-8 rounded-md transition duration-300">Logout</button>
            </form>
        </div>
    </div>
@endsection