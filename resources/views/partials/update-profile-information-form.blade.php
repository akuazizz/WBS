<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
        <p class="mt-1 text-sm text-gray-600">Perbarui informasi profil dan alamat email akun Anda.</p>
    </header>

    {{-- PENTING: tambahkan enctype untuk upload file --}}
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Bagian Foto Profil --}}
        <div x-data="{photoName: null, photoPreview: null}">
            <!-- Input File Foto -->
            <input type="file" name="photo" id="photo" class="hidden"
                   x-ref="photo"
                   @change="
                       photoName = $refs.photo.files[0].name;
                       const reader = new FileReader();
                       reader.onload = (e) => {
                           photoPreview = e.target.result;
                       };
                       reader.readAsDataURL($refs.photo.files[0]);
                   " />

            <label for="photo" class="block font-medium text-sm text-gray-700">Foto Profil</label>

            <!-- Foto Profil Saat Ini -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- Preview Foto Baru -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                      :style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <button type="button" @click="$refs.photo.click()"
                    class="mt-2 text-sm text-indigo-600 hover:text-indigo-800">
                Pilih Foto Baru
            </button>
            @error('photo')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
        </div>


        {{-- Input Nama, Email, Kontak (Tetap sama) --}}
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="kontak" class="block font-medium text-sm text-gray-700">Kontak</label>
            <input id="kontak" name="kontak" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('kontak', $user->kontak) }}">
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
            @endif
        </div>
    </form>
</section>