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
        Schema::create('calon_penerima', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique(); // Kolom no_pendaftaran yang unik
            $table->string('nama_calon_penerima'); // Kolom nama calon penerima
            $table->string('asal_sekolah'); // Kolom asal sekolah
            $table->string('pilihan_beasiswa'); // Kolom pilihan beasiswa
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_penerima');
    }
};
