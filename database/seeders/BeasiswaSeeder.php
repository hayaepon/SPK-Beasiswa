<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    public function run()
    {
        Beasiswa::create(['beasiswa' => 'KIP-K', 'deskripsi' => 'Beasiswa untuk KIP-K']);
        Beasiswa::create(['beasiswa' => 'Tahfidz', 'deskripsi' => 'Beasiswa untuk program Tahfidz']);
    }
}

