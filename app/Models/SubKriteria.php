<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'subkriteria',  // Nama sub-kriteria
        'kriteria_id',   // Asumsi bahwa ini adalah foreign key dari Kriteria
        'nilai',
    ];

    // Relasi dengan model Kriteria jika diperlukan
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
