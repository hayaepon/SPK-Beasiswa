<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    // Menentukan kolom yang bisa di-assign
    protected $fillable = [
        'beasiswa',
        'kriteria',
        'bobot',
    ];

    // Relasi dengan SubKriteria
    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }
}
