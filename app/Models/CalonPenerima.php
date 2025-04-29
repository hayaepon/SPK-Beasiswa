<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPenerima extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai dengan database
    protected $table = 'calon_penerima'; // Nama tabel sesuai database

    protected $fillable = [
        'no_pendaftaran', 
        'nama_calon_penerima', 
        'asal_sekolah', 
        'pilihan_beasiswa',
    ];
}
