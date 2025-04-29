<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use Illuminate\Http\Request;

class PerhitunganSMARTController extends Controller
{
    public function index()
    {
        // Ambil data calon penerima untuk ditampilkan di tabel
        $dataCalonPenerima = CalonPenerima::all();
        
        // Kirim data ke view untuk ditampilkan
        return view('superadmin.perhitungan-smart', compact('dataCalonPenerima'));
    }

    public function hitung(Request $request)
    {
        // Ambil data calon penerima untuk dihitung
        $dataCalonPenerima = CalonPenerima::all();

        // Melakukan perhitungan SMART untuk setiap calon penerima
        foreach ($dataCalonPenerima as $data) {
            $data->nilai_kriteria1 = $data->kriteria1 * 0.25; // Sesuaikan dengan bobot
            $data->nilai_kriteria2 = $data->kriteria2 * 0.25; // Sesuaikan dengan bobot
            $data->nilai_kriteria3 = $data->kriteria3 * 0.25; // Sesuaikan dengan bobot
            $data->nilai_kriteria4 = $data->kriteria4 * 0.25; // Sesuaikan dengan bobot

            // Simpan hasil perhitungan ke dalam database
            $data->save();
        }

        // Kembali ke halaman perhitungan SMART dengan data yang sudah diperbarui
        return redirect()->route('perhitungan-smart.index');
    }
}
