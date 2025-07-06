<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tindak_lanjuts', function (Blueprint $table) {
            $table->id();
            // Hubungkan ke tabel pengaduans
            $table->foreignId('pengaduan_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi');
            $table->text('catatan_administrator')->nullable();
            $table->string('lampiran_path')->nullable();
            // Siapa yang membuat tindak lanjut ini? 'pelapor' atau 'admin'
            $table->enum('dibuat_oleh', ['pelapor', 'administrator']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjuts');
    }
};
