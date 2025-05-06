<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    // Menampilkan semua data kriteria
    public function index()
    {
        // Mengambil semua data kriteria
        $kriterias = Kriteria::all();

        // Memeriksa apakah pengguna adalah superadmin atau admin
        if (Auth::user()->role === 'superadmin') {
            // Jika superadmin, tampilkan di halaman superadmin
            return view('superadmin.kriteria_bobot', compact('kriterias'));
        } elseif (Auth::user()->role === 'admin') {
            // Jika admin, hanya tampilkan data tanpa bisa mengedit
            return view('admin.kriteria_bobot', compact('kriterias'));
        }

        // Jika tidak sesuai role, redirect ke dashboard
        return redirect()->route('dashboard')->with('error', 'Akses ditolak');
    }

    // Menyimpan data kriteria (Superadmin hanya)
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'beasiswa' => 'required',
            'kriteria' => 'required',
            'bobot' => 'required|numeric',
        ]);

        // Menyimpan data kriteria
        Kriteria::create($request->all());

        // Redirect ke halaman kriteria
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil disimpan');
    }

    // Menampilkan form edit kriteria (Superadmin hanya)
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);

        // Pastikan hanya superadmin yang bisa mengedit
        if (Auth::user()->role === 'superadmin') {
            return view('superadmin.kriteria_edit', compact('kriteria'));
        }

        // Jika bukan superadmin, arahkan ke halaman kriteria
        return redirect()->route('kriteria.index')->with('error', 'Akses ditolak');
    }

    // Memperbarui data kriteria (Superadmin hanya)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'beasiswa' => 'required',
            'kriteria' => 'required',
            'bobot' => 'required|numeric',
        ]);

        // Ambil data kriteria berdasarkan ID
        $kriteria = Kriteria::findOrFail($id);

        // Perbarui data kriteria
        $kriteria->update($request->all());

        // Redirect kembali ke halaman kriteria
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diperbarui!');
    }

    // Menghapus data kriteria (Superadmin hanya)
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        // Redirect ke halaman kriteria dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil dihapus');
    }
}
