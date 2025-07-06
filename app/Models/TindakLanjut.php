<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengaduan_id',
        'deskripsi',
        'catatan_administrator',
        'lampiran_path',
        'dibuat_oleh'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
