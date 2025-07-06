<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_pengaduan',
        'nama_terduga',
        'jabatan_terduga',
        'unit_kerja',
        'uraian_pengaduan', // <<< UBAH INI
        'dokumen_path',
        'info_pelapor',     // <<< INI SUDAH BENAR
        'email_pelapor',    // <<< TAMBAHKAN INI
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tindak_lanjuts()
    {
        return $this->hasMany(TindakLanjut::class)->orderBy('created_at', 'asc');
    }
}
