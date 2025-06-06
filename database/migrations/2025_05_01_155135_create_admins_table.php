<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('admins', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('username');
        $table->enum('role', ['SuperAdmin', 'Admin']);
        $table->enum('status', ['Aktif', 'Non-Aktif']);
        $table->timestamps();
    });
}
}