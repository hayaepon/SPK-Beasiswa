<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari plural default
    protected $table = 'beasiswa';

    // Tentukan kolom yang boleh diisi
    protected $fillable = ['beasiswa', 'deskripsi'];  // Sesuaikan dengan kolom yang ada di tabel
}

