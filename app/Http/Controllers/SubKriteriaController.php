<?php
namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubKriteriaController extends Controller
{
    // Menampilkan semua data subkriteria
    public function index()
    {
        $subKriterias = SubKriteria::all();

        // Memeriksa apakah pengguna adalah superadmin atau admin
        if (Auth::user()->role === 'superadmin') {
            // Jika Superadmin, tampilkan di halaman superadmin
            return view('superadmin.subkriteria.index', compact('subKriterias'));
        } elseif (Auth::user()->role === 'admin') {
            // Jika Admin, hanya tampilkan data tanpa bisa mengedit atau menghapus
            return view('admin.subkriteria', compact('subKriterias'));
        }

        // Jika tidak sesuai role, redirect ke dashboard
        return redirect()->route('dashboard')->with('error', 'Akses ditolak');
    }

    // Menampilkan form untuk menambah subkriteria (hanya untuk Superadmin)
    public function create()
    {
        $kriterias = Kriteria::all(); // Menampilkan semua kriteria yang ada
        return view('superadmin.subkriteria.create', compact('kriterias'));
    }

    // Menyimpan data subkriteria (hanya untuk Superadmin)
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

    // Menampilkan form untuk mengedit subkriteria (hanya untuk Superadmin)
    public function edit($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all();  // Fetch all Kriteria for the dropdown
        return view('superadmin.subkriteria.edit', compact('subKriteria', 'kriterias'));
    }

    // Memperbarui data subkriteria (hanya untuk Superadmin)
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

    // Menghapus data subkriteria (hanya untuk Superadmin)
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
