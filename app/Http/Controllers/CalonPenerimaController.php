<?php

namespace App\Http\Controllers;

use App\Models\CalonPenerima;
use Illuminate\Http\Request;

class CalonPenerimaController extends Controller
{
    public function index()
    {
        $dataCalonPenerima = CalonPenerima::all();
        return view('superadmin.data_calonpenerima', compact('dataCalonPenerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required',
            'nama_calon_penerima' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_beasiswa' => 'required',
        ]);

        CalonPenerima::create($request->all());
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = CalonPenerima::findOrFail($id);
        return view('superadmin.edit_calon_penerima', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input yang diterima dari form
        $validated = $request->validate([
            'no_pendaftaran' => 'required',
            'nama_calon_penerima' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_beasiswa' => 'required',
        ]);

        // Ambil data berdasarkan ID
        $data = CalonPenerima::findOrFail($id);

        // Perbarui data berdasarkan input
        $data->no_pendaftaran = $request->no_pendaftaran;
        $data->nama_calon_penerima = $request->nama_calon_penerima;
        $data->asal_sekolah = $request->asal_sekolah;
        $data->pilihan_beasiswa = $request->pilihan_beasiswa;

        // Simpan perubahan data
        $data->save();

        // Redirect ke halaman data calon penerima dengan pesan sukses
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = CalonPenerima::findOrFail($id);
        $data->delete();
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil dihapus');
    }
}
