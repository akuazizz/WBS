<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // Buat data teks menjadi 'sometimes' agar tidak selalu wajib ada di request
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'kontak' => ['nullable', 'string', 'max:20'],
            'username' => ['sometimes', 'required', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'jenis_kelamin' => ['nullable', 'string', 'in:Laki-laki,Perempuan'],

            // Validasi untuk foto tetap sama
            'photo' => ['nullable', 'image', 'max:1024'], // maks 1MB
        ];
    }
}
