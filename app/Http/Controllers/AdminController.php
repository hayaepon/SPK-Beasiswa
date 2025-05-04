<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Pastikan model Admin sudah ada
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method untuk menampilkan daftar admin
    public function index()
    {
        // Mengambil data semua admin dari database
        $admins = Admin::all();

        // Menampilkan view dengan data admin
        return view('superadmin.manajemen_admin', compact('admins'));
    }

    // Method untuk menampilkan form tambah admin
    public function create()
    {
        return view('superadmin.admin.create'); // Mengarahkan ke form create
    }

    // Method untuk menyimpan data admin baru
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Membuat objek admin baru
        $admin = new Admin([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        // Menyimpan admin ke dalam database
        $admin->save();

        // Redirect ke halaman daftar admin dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit admin (optional, jika diperlukan)
    public function edit($id)
    {
        $admin = Admin::findOrFail($id); // Mengambil data admin berdasarkan ID
        return view('superadmin.admin.edit', compact('admin')); // Menampilkan form edit
    }

    // Method untuk mengupdate data admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'username' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        $admin = Admin::findOrFail($id); // Menemukan admin berdasarkan ID
        $admin->update($request->all()); // Mengupdate data admin

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui!');
    }

    // Method untuk menghapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id); // Menemukan admin berdasarkan ID
        $admin->delete(); // Menghapus admin

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus!');
    }
}
