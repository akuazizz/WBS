<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan setelah kolom 'email' agar rapi
            $table->string('username')->unique()->nullable()->after('email');
            $table->string('kontak')->nullable()->after('username');
            $table->string('jenis_kelamin')->nullable()->after('kontak');
            $table->string('status_user')->default('Aktif')->after('jenis_kelamin');
            // Anda juga bisa tambahkan kolom lain jika perlu di sini
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'kontak', 'jenis_kelamin', 'status_user']);
        });
    }
};
