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
            // Melakukan perhitungan dengan bobot untuk setiap kriteria
            $nilaiKriteria1 = $data->kriteria1 * 0.25; // Bobot 25%
            $nilaiKriteria2 = $data->kriteria2 * 0.25; // Bobot 25%
            $nilaiKriteria3 = $data->kriteria3 * 0.25; // Bobot 25%
            $nilaiKriteria4 = $data->kriteria4 * 0.25; // Bobot 25%

            // Total nilai perhitungan SMART
            $totalNilai = $nilaiKriteria1 + $nilaiKriteria2 + $nilaiKriteria3 + $nilaiKriteria4;

            // Tentukan keterangan berdasarkan total nilai
            $keterangan = $totalNilai >= 75 ? 'Layak' : 'Tidak Layak';

            // Simpan hasil perhitungan dan keterangan ke dalam database
            $data->update([
                'nilai_kriteria1' => $nilaiKriteria1,
                'nilai_kriteria2' => $nilaiKriteria2,
                'nilai_kriteria3' => $nilaiKriteria3,
                'nilai_kriteria4' => $nilaiKriteria4,
                'total_nilai' => $totalNilai,
                'keterangan' => $keterangan
            ]);
        }

        // Kembali ke halaman perhitungan SMART dengan data yang sudah diperbarui
        return redirect()->route('perhitungan-smart.index')->with('success', 'Perhitungan SMART berhasil!');
    }
}
