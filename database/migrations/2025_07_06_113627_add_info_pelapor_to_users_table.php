<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'info_pelapor' setelah kolom 'jenis_kelamin' (atau sesuaikan)
            // Beri nilai default 'umum' untuk semua user yang sudah ada
            $table->enum('info_pelapor', ['asn', 'umum'])->after('jenis_kelamin')->default('umum');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ini untuk membatalkan migrasi jika diperlukan
            $table->dropColumn('info_pelapor');
        });
    }
};
