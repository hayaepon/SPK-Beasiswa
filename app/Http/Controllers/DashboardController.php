<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar; // Import Model Pendaftar
use App\Models\PendaftarTahfiz; // Import Model PendaftarTahfiz
use App\Models\PendaftarKIPK; // Import Model PendaftarKIPK
use App\Models\LolosSeleksi; // Import Model LolosSeleksi
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::count();
        $pendaftarTahfiz = PendaftarTahfiz::count();
        $pendaftarKipK = PendaftarKIPK::count();
        $lolosSeleksi = LolosSeleksi::count();

        return view('admin.dashboard-admin', compact('pendaftar', 'pendaftarTahfiz', 'pendaftarKipK', 'lolosSeleksi'));
    }
}
