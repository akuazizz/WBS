@extends('layouts.admin')

@section('content')
  <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">
    Edit User: {{ $user->name }}
  </h1>

  <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Nama -->
      <div>
      <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
      <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
      @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <!-- Email -->
      <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
      <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
      @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <!-- Kontak -->
      <div>
      <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak (No. HP)</label>
      <input type="text" name="kontak" id="kontak" value="{{ old('kontak', $user->kontak) }}"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
      @error('kontak') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <!-- Role -->
      <div>
      <label for="roles" class="block text-sm font-medium text-gray-700">Role</label>
      <select name="roles[]" id="roles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

        <option value="" {{ $user->getRoleNames()->isEmpty() ? 'selected' : '' }}>
        User Biasa (Pelapor)
        </option>

        @foreach ($roles as $role)
      <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
      {{ Str::ucfirst($role->name) }}
      </option>
      @endforeach
      </select>
      @error('roles') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>

      <!-- Password -->
      <div class="md:col-span-2">
      <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
      <input type="password" name="password" id="password"
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
      <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password.</small>
      @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="mt-8 flex justify-end">
      <a href="{{ route('admin.users.index') }}"
      class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
      Batal
      </a>
      <button type="submit"
      class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
      Simpan Perubahan
      </button>
    </div>
    </form>
  </div>
@endsection