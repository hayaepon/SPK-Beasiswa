<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonPenerimaController extends Controller
{
    // Menampilkan data calon penerima
    public function index()
    {
        $dataCalonPenerima = CalonPenerima::all();

        // Cek apakah pengguna Superadmin atau Admin
        if (Auth::user()->role === 'superadmin') {
            // Jika Superadmin, tampilkan dengan kemampuan untuk mengedit dan menghapus
            return view('superadmin.data_calon_penerima', compact('dataCalonPenerima'));
        } elseif (Auth::user()->role === 'admin') {
            // Jika Admin, hanya tampilkan data
            return view('admin.data_calon_penerima', compact('dataCalonPenerima'));
        }

        // Redirect jika role tidak dikenali
        return redirect()->route('dashboard');
    }

    // Menyimpan data calon penerima baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_pendaftaran' => 'required',
            'nama_calon_penerima' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_beasiswa' => 'required',
        ]);

        // Menyimpan data calon penerima baru
        CalonPenerima::create($request->all());

        // Redirect ke halaman data calon penerima dengan pesan sukses
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil disimpan');
    }

    // Menampilkan form untuk mengedit data calon penerima
    public function edit($id)
    {
        $data = CalonPenerima::findOrFail($id);

        // Arahkan ke halaman edit berdasarkan role
        if (Auth::user()->role === 'superadmin') {
            return view('superadmin.edit_calon_penerima', compact('data'));
        }

        return redirect()->route('data-calon-penerima')->with('error', 'Akses ditolak');
    }

    // Mengupdate data calon penerima
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'no_pendaftaran' => 'required',
            'nama_calon_penerima' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_beasiswa' => 'required',
        ]);

        // Ambil data berdasarkan ID
        $data = CalonPenerima::findOrFail($id);

        // Perbarui data calon penerima
        $data->no_pendaftaran = $request->no_pendaftaran;
        $data->nama_calon_penerima = $request->nama_calon_penerima;
        $data->asal_sekolah = $request->asal_sekolah;
        $data->pilihan_beasiswa = $request->pilihan_beasiswa;

        // Simpan perubahan
        $data->save();

        // Redirect ke halaman data calon penerima dengan pesan sukses
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data calon penerima
    public function destroy($id)
    {
        // Temukan data yang akan dihapus
        $data = CalonPenerima::findOrFail($id);
        $data->delete();

        // Redirect ke halaman data calon penerima dengan pesan sukses
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil dihapus');
    }
}
