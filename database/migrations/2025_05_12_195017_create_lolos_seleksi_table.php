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
    Schema::create('lolos_seleksi', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pendaftar_id'); // Relasi ke tabel pendaftar
        $table->foreign('pendaftar_id')->references('id')->on('pendaftar')->onDelete('cascade');
        $table->boolean('status_lolos')->default(false); // Status lolos atau tidak
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lolos_seleksi');
    }
};
