<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    // Menampilkan semua data subkriteria
    public function index()
    {
        $subKriterias = SubKriteria::all();
        return view('superadmin.subkriteria.index', compact('subKriterias'));
    }

    // Menampilkan form untuk menambah subkriteria
    public function create()
{
    $kriterias = Kriteria::all(); // Menampilkan semua kriteria yang ada
    return view('superadmin.subkriteria.create', compact('kriterias'));  // Mengirim data kriteria ke view
}
    // Menyimpan data subkriteria
    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required',
            'subkriteria' => 'required',
            'nilai' => 'required',
        ]);

        SubKriteria::create($request->all());
        return redirect()->route('subkriteria.index');
    }

    // Menampilkan form untuk mengedit subkriteria
    public function edit($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all();  // Fetch all Kriteria for the dropdown
        return view('superadmin.subkriteria.edit', compact('subKriteria', 'kriterias'));  // Pass both subKriteria and kriterias
    }

    // Memperbarui data subkriteria
    public function update(Request $request, $id)
    {
        $request->validate([
            'kriteria_id' => 'required',
            'subkriteria' => 'required',
            'nilai' => 'required',
        ]);

        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->update($request->all());
        return redirect()->route('subkriteria.index');
    }

    // Menghapus data subkriteria
    public function destroy($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->delete();
        return redirect()->route('subkriteria.index');
    }

    // Fetch Kriteria based on selected Beasiswa (AJAX)
    public function getKriteriaByBeasiswa($beasiswa)
    {
        $kriterias = Kriteria::where('beasiswa', $beasiswa)->get();  // Ambil kriteria berdasarkan beasiswa
        return response()->json($kriterias);  // Kembalikan data kriteria dalam format JSON
    }
}
