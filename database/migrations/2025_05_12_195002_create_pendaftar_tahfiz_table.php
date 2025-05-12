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
    Schema::create('pendaftar_tahfiz', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pendaftar_id');
        $table->foreign('pendaftar_id')->references('id')->on('pendaftar')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_tahfiz');
    }
};
