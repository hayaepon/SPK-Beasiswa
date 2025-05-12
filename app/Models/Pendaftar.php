<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'pendaftar'; // Pastikan nama tabel sesuai dengan yang ada di database

    // Tentukan kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'nama',
        'email',
    ];

    // Relasi dengan tabel PendaftarTahfiz
    public function pendaftarTahfiz()
    {
        return $this->hasMany(PendaftarTahfiz::class);
    }

    // Relasi dengan tabel PendaftarKIPK
    public function pendaftarKipK()
    {
        return $this->hasMany(PendaftarKIPK::class);
    }

    // Relasi dengan tabel LolosSeleksi
    public function lolosSeleksi()
    {
        return $this->hasOne(LolosSeleksi::class);
    }
}
