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
        return view('edit_calon_penerima', compact('data'));
    }

    public function destroy($id)
    {
        $data = CalonPenerima::findOrFail($id);
        $data->delete();
        return redirect()->route('data-calon-penerima')->with('success', 'Data berhasil dihapus');
    }
}
