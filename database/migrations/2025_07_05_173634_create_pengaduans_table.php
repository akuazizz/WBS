<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengaduan')->unique(); // Kolom untuk kode tracking unik
            $table->string('nama_terduga');
            $table->string('jabatan_terduga')->nullable();
            $table->string('unit_kerja');
            $table->text('uraian_pengaduan');
            $table->string('dokumen_path')->nullable(); // Menyimpan path file
            $table->enum('info_pelapor', ['asn', 'umum']);
            $table->string('email_pelapor');
            $table->enum('status', ['Baru', 'Diproses', 'Selesai', 'Ditolak'])->default('Baru');
            $table->timestamps(); // otomatis membuat created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};