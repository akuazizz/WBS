@extends('layouts.admin')

@section('content')
  <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Log Aktivitas Sistem</h1>

  <div class="bg-white rounded-lg shadow-md">
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Aktivitas
        </th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      @forelse ($activities as $activity)
      <tr>
      <td class="px-6 py-4">
      <div class="flex items-center">
        {{-- Ikon berdasarkan event --}}
        <div class="mr-4">
        @if($activity->event === 'created')
      <span class="inline-block h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
      <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      </span>
      @elseif($activity->event === 'updated')
      <span class="inline-block h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
      <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
      </svg>
      </span>
      @elseif($activity->event === 'deleted')
      <span class="inline-block h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
      <svg class="h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
      </svg>
      </span>
      @else
      <span class="inline-block h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
      <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
      </svg>
      </span>
      @endif
        </div>
        <div class="text-sm">
        <p class="text-gray-900">
        {{-- Gabungkan Pelaku dan Deskripsi --}}
        <span class="font-bold">{{ $activity->causer->name ?? 'Sistem' }}</span>
        {{ $activity->description }}.
        </p>
        <p class="text-xs text-gray-500 mt-1">
        {{ $activity->created_at->diffForHumans() }}
        ({{ $activity->created_at->isoFormat('D MMM Y, HH:mm') }})
        </p>
        </div>
      </div>
      </td>
      </tr>
    @empty
      <tr>
      <td class="text-center py-10 text-gray-500">
      Belum ada aktivitas yang tercatat.
      </td>
      </tr>
    @endforelse
      </tbody>
    </table>
    </div>
    <div class="p-4 border-t">
    {{ $activities->links() }}
    </div>
  </div>
@endsection