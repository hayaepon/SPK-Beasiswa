<?php
namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    // Menampilkan semua data subkriteria
    public function index()
    {
        $subKriterias = SubKriteria::all();
        return view('subkriteria.index', compact('subKriterias'));
    }

    // Menampilkan form untuk menambah subkriteria
    public function create()
    {
        return view('subkriteria.create');
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
        return view('subkriteria.edit', compact('subKriteria'));
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
}
