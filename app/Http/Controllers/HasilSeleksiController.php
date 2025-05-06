<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use App\Exports\HasilSeleksiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class HasilSeleksiController extends Controller
{
    // Menampilkan halaman hasil seleksi dengan filter berdasarkan beasiswa
    public function index(Request $request)
    {
        // Ambil data hasil seleksi dari database
        $query = CalonPenerima::query();
        
        // Filter berdasarkan beasiswa jika ada
        if ($request->has('beasiswa') && in_array($request->get('beasiswa'), ['KIP-K', 'Tahfidz'])) {
            $query->where('pilihan_beasiswa', $request->get('beasiswa'));  // Perbaiki kolom 'pilihan_beasiswa'
        }

        $hasilSeleksi = $query->get(); // Ambil hasil seleksi dari database

        // Mengecek peran pengguna dan mengarahkan ke view yang sesuai
        if (auth()->user()->role == 'admin') {
            return view('admin.hasil-seleksi', compact('hasilSeleksi')); // View untuk admin
        } else {
            return view('superadmin.hasil-seleksi', compact('hasilSeleksi')); // View untuk superadmin
        }
    }

    // Ekspor ke Excel
    public function exportExcel()
    {
        // Pastikan sudah membuat HasilSeleksiExport yang akan mengatur data untuk ekspor
        return Excel::download(new HasilSeleksiExport, 'hasil-seleksi.xlsx');
    }

    // Ekspor ke PDF
    public function exportPDF()
    {
        // Ambil data hasil seleksi dari database
        $hasilSeleksi = CalonPenerima::all();

        // Pastikan sudah membuat view untuk PDF yang diinginkan
        $pdf = PDF::loadView('superadmin.hasil-seleksi-pdf', compact('hasilSeleksi')); // Menggunakan view superadmin/hasil-seleksi-pdf

        // Unduh file PDF
        return $pdf->download('hasil-seleksi.pdf');
    }

    // Fungsi ekspor berdasarkan format (PDF/Excel)
    public function export(Request $request)
    {
        $format = $request->get('format'); // Ambil format dari parameter (pdf/excel)

        if ($format == 'pdf') {
            return $this->exportPDF(); // Panggil fungsi ekspor PDF
        } elseif ($format == 'excel') {
            return $this->exportExcel(); // Panggil fungsi ekspor Excel
        }

        // Jika tidak ada format yang dipilih, redirect kembali ke halaman hasil seleksi
        return redirect()->route('hasil-seleksi');
    }
}
