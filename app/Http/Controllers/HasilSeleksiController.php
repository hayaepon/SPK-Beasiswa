<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonPenerima;

class HasilSeleksiController extends Controller
{
    // Metode index untuk menampilkan halaman hasil seleksi
    public function index()
    {
        // Ambil data hasil seleksi dari database atau proses perhitungan sebelumnya
        $hasilSeleksi = CalonPenerima::all(); // Pastikan data ini sesuai dengan kebutuhan

        return view('superadmin.hasil-seleksi', compact('hasilSeleksi'));
    }

    // Fungsi untuk ekspor ke Excel
    public function exportExcel()
    {
        return Excel::download(new HasilSeleksiExport, 'hasil-seleksi.xlsx');
    }
}
