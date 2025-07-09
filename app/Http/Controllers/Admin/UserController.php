<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gunakan with() untuk Eager Loading relasi roles dan pengaduans
        $users = User::with(['roles', 'pengaduans'])
            ->where('id', '!=', Auth::id())
            ->latest()
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Ambil semua role yang ada di database untuk ditampilkan di dropdown
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            // Email harus unik, tapi abaikan user yang sedang diedit
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'kontak' => 'nullable|string|max:20',
            'roles' => 'nullable|array',
            // Password hanya divalidasi jika diisi
            'password' => 'nullable|string|min:8',
        ]);

        // Update data dasar user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'kontak' => $request->kontak,
        ]);

        // Jika password diisi, update passwordnya
        if ($request->filled('password')) {
            $user->password = $request->input('password');
            $user->save();
        }

        // Sinkronkan role. syncRoles() akan menghapus role lama dan menerapkan yang baru.
        $user->syncRoles($request->roles ?? []);

        return redirect()->route('admin.users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Tambahan: Jangan biarkan admin menghapus dirinya sendiri
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
