<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LolosSeleksi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'lolos_seleksi'; // Pastikan nama tabel sesuai dengan yang ada di database

    // Tentukan kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'pendaftar_id',
        'status_lolos',
    ];

    // Relasi dengan tabel Pendaftar
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
