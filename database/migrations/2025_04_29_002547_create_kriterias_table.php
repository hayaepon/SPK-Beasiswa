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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis
            $table->string('beasiswa'); // Kolom untuk jenis beasiswa (KIP-K, Tahfiz, dll)
            $table->string('kriteria'); // Kolom untuk kriteria
            $table->integer('bobot'); // Kolom untuk bobot kriteria (angka)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias'); // Menghapus tabel jika migrasi dibatalkan
    }
};
