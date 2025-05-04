<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonPenerima;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF; // Untuk PDF Export
use App\Exports\HasilSeleksiExport; // Pastikan kamu sudah membuat file ini (untuk Excel Export)

class HasilSeleksiController extends Controller
{
    // Metode index untuk menampilkan halaman hasil seleksi
    public function index()
    {
        // Ambil data hasil seleksi dari database atau proses perhitungan sebelumnya
        $hasilSeleksi = CalonPenerima::all(); // Ambil semua data calon penerima

        return view('superadmin.hasil-seleksi', compact('hasilSeleksi'));
    }

    // Fungsi untuk ekspor ke Excel
    public function exportExcel()
    {
        return Excel::download(new HasilSeleksiExport, 'hasil-seleksi.xlsx');
    }

    // Fungsi untuk ekspor ke PDF
    public function exportPDF()
    {
        $hasilSeleksi = CalonPenerima::all(); // Ambil data hasil seleksi dari database

        // Pastikan kamu sudah membuat view untuk PDF di 'superadmin.hasil-seleksi-pdf'
        $pdf = PDF::loadView('superadmin.hasil-seleksi-pdf', compact('hasilSeleksi')); // Menggunakan view untuk PDF
        return $pdf->download('hasil-seleksi.pdf');
    }

    // Fungsi untuk menangani ekspor berdasarkan format (PDF/Excel)
    public function export(Request $request)
    {
        $format = $request->get('format'); // Menangkap parameter format

        // Cek jika format yang dipilih adalah PDF atau Excel
        if ($format == 'pdf') {
            return $this->exportPDF(); // Panggil fungsi exportPDF
        } elseif ($format == 'excel') {
            return $this->exportExcel(); // Panggil fungsi exportExcel
        }

        // Jika tidak ada format yang dipilih, redirect kembali ke halaman hasil seleksi
        return redirect()->route('hasil-seleksi');
    }
}
