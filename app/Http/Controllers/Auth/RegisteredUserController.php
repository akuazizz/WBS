<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_pengaduan' => [
                'required',
                'string',
                Rule::exists('pengaduans', 'kode_pengaduan')->where(function ($query) {
                    return $query->whereNull('user_id');
                }),
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'kontak' => ['required', 'string', 'max:20'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'jenis_kelamin' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(6)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ], [
            'kode_pengaduan.exists' => 'Kode pengaduan tidak ditemukan atau sudah pernah diklaim oleh akun lain.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'info_pelapor' => 'umum',
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Pengaduan::where('kode_pengaduan', $request->kode_pengaduan)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
