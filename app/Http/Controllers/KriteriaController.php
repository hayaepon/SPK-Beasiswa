<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Menampilkan semua data kriteria
    public function index()
    {
        $kriterias = Kriteria::all();  // Mengambil semua data kriteria
        return view('superadmin.kriteria_bobot', compact('kriterias'));
    }

    // Menyimpan data kriteria
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
        return redirect()->route('kriteria.index');
    }

    // Menampilkan form edit kriteria
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('superadmin.kriteria_edit', compact('kriteria'));
    }

    // Memperbarui data kriteria
    public function update(Request $request, $id)
    {
        $request->validate([
            'beasiswa' => 'required',
            'kriteria' => 'required',
            'bobot' => 'required|numeric',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

        return redirect()->route('kriteria.index');
    }

    // Menghapus data kriteria
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index');
    }
}
