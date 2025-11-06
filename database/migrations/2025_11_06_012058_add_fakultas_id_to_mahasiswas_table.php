<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom fakultas_id ke tabel mahasiswas.
     */
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            // Tambah kolom fakultas_id dan buat foreign key ke tabel fakultas
            $table->foreignId('fakultas_id')
                  ->after('nama')
                  ->constrained('fakultas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Hapus kolom fakultas_id jika rollback dijalankan.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
            $table->dropColumn('fakultas_id');
        });
    }
};
