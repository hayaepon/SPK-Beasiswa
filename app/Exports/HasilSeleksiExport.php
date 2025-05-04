<?php

namespace App\Exports;

use App\Models\CalonPenerima;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilSeleksiExport implements FromCollection
{
    public function collection()
    {
        return CalonPenerima::all(); // Mengambil semua data dari model CalonPenerima
    }
}
