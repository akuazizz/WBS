<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Menampilkan form profil pengguna.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // 1. Dapatkan data yang sudah divalidasi dari ProfileUpdateRequest bawaan Breeze.
        // Ini sudah mencakup validasi 'name' dan 'email'.
        $validatedDataBreeze = $request->validated();

        // 2. Validasi field tambahan Anda sendiri.
        $validatedDataCustom = $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            'jenis_kelamin' => ['nullable', 'string', 'in:Laki-laki,Perempuan'],
            'kontak' => ['nullable', 'string', 'max:255'],
        ]);

        // 3. Gabungkan kedua data yang sudah tervalidasi menjadi satu array.
        $allValidatedData = array_merge($validatedDataBreeze, $validatedDataCustom);

        // 4. Isi semua data ke user object menggunakan fill().
        // Ini lebih aman dan efisien karena hanya mengisi field yang ada di $fillable.
        $request->user()->fill($allValidatedData);

        // 5. Periksa jika email diubah, reset verifikasi.
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // 6. Simpan semua perubahan ke database.
        $request->user()->save();

        // 7. Redirect kembali dengan pesan sukses.
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Menghapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Kode ini adalah implementasi standar dari Laravel Breeze.
        // Ini penting untuk fungsionalitas hapus akun.
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
