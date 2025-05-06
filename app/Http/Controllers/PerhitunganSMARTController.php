<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Beasiswa;  // Pastikan diimpor
use Illuminate\Http\Request;

class PerhitunganSMARTController extends Controller
{
    // Menampilkan halaman perhitungan SMART
    public function index()
    {
        // Ambil data calon penerima dan beasiswa
        $dataCalonPenerima = CalonPenerima::all();
        $beasiswa = Beasiswa::all(); 
        $kriteria = Kriteria::all();  // Ambil data beasiswa
        $subKriteria = SubKriteria::all(); // Ambil data subkriteria

        // Kirim data ke view untuk ditampilkan
        return view('admin.perhitungan-smart', compact('dataCalonPenerima', 'beasiswa', 'kriteria', 'subKriteria'));
    }

    // Melakukan perhitungan SMART
    public function hitung(Request $request)
    {
        // Validasi input
        $request->validate([
            'calon_penerima_id' => 'required|exists:calon_penerima,id',
            'beasiswa_id' => 'required|exists:beasiswa,id',
            'kriteria' => 'required|array',
            'subkriteria' => 'required|array',
        ]);

        // Ambil data calon penerima dan beasiswa
        $calonPenerima = CalonPenerima::findOrFail($request->calon_penerima_id);
        $beasiswa = Beasiswa::findOrFail($request->beasiswa_id);

        // Loop untuk setiap kriteria dan subkriteria yang dipilih
        $totalNilai = 0;
        $bobotTotal = 0;
        
        foreach ($request->kriteria as $key => $kriteriaId) {
            // Ambil kriteria berdasarkan ID
            $kriteria = Kriteria::findOrFail($kriteriaId);
            $subKriteriaId = $request->subkriteria[$key];
            $subKriteria = SubKriteria::findOrFail($subKriteriaId);
            
            // Menghitung nilai kriteria berdasarkan subkriteria
            $nilaiSubKriteria = $subKriteria->nilai * $kriteria->bobot; // Asumsikan subkriteria memiliki nilai dan kriteria memiliki bobot
            
            // Total nilai untuk setiap kriteria
            $totalNilai += $nilaiSubKriteria;
            $bobotTotal += $kriteria->bobot; // Menjumlahkan bobot untuk perhitungan final
        }

        // Tentukan keterangan berdasarkan total nilai
        $keterangan = $totalNilai / $bobotTotal >= 0.75 ? 'Layak' : 'Tidak Layak';

        // Update data perhitungan SMART pada calon penerima
        $calonPenerima->update([
            'total_nilai' => $totalNilai,
            'keterangan' => $keterangan,
        ]);

        // Kembali ke halaman perhitungan SMART dengan data yang sudah diperbarui
        return redirect()->route('perhitungan-smart.index')->with('success', 'Perhitungan SMART berhasil!');
    }
}
