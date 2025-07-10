@extends('layouts.admin')

@section('content')
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-800" style="color: #004F98;">Manajemen User</h1>
    <a href="{{ route('admin.users.create') }}"
    class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition-colors">
    + Tambah User Baru
    </a>
  </div>

  @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
    <p>{{ session('success') }}</p>
    </div>
  @endif

  <div class="bg-white rounded-lg shadow-md p-6">
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama & Kontak</th>
        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kode Pengaduan</th>
        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      @forelse ($users as $user)
      <tr>
        <td class="px-4 py-2 whitespace-nowrap text-sm">
        <div class="font-bold">{{ $user->name }}</div>
        <div class="text-gray-500">{{ $user->kontak ?? 'N/A' }}</div>
        </td>
        <td class="px-4 py-2 whitespace-nowrap text-sm">{{ $user->email }}</td>
        <td class="px-4 py-2 whitespace-nowrap text-sm">
        {{-- Jika user tidak punya role sama sekali, tampilkan 'User' --}}
        @forelse($user->getRoleNames() as $role)
      <span
        class="bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ Str::ucfirst($role) }}</span>
      @empty
      <span class="bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">User</span>
      @endforelse
        </td>
        <td class="px-4 py-2 whitespace-nowrap text-sm font-mono">
        {{-- Tampilkan kode pengaduan, jika ada --}}
        @foreach ($user->pengaduans as $pengaduan)
      <div>{{ $pengaduan->kode_pengaduan }}</div>
      @endforeach
        @if($user->pengaduans->isEmpty())
      -
      @endif
        </td>
        <td class="px-4 py-2 whitespace-nowrap text-sm">
  <div class="flex items-center space-x-2">
    <a href="{{ route('admin.users.edit', $user->id) }}"
       class="bg-blue-100 text-blue-800 px-3 py-1 rounded-md text-xs font-semibold hover:bg-blue-200 transition">
       Edit
    </a>
    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
          onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini? Ini tidak bisa dibatalkan.');">
      @csrf
      @method('DELETE')
      <button type="submit"
              class="bg-red-100 text-red-800 px-3 py-1 rounded-md text-xs font-semibold hover:bg-red-200 transition">
        Hapus
      </button>
    </form>
  </div>
</td>
      </tr>
    @empty
      <tr>
      <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data user.</td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>
    <div class="mt-6">
    {{ $users->links() }}
    </div>
  </div>
@endsection 