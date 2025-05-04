<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk enkripsi password

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
            'password' => 'required|string|min:8', // Validasi password
        ]);

        // Membuat objek admin baru
        $admin = new Admin([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Menyimpan admin ke dalam database
        $admin->save();

        // Redirect ke halaman daftar admin dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit admin
    public function edit($id)
    {
        // Mengambil data admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Menampilkan form edit dengan data admin
        return view('superadmin.admin.edit', compact('admin'));
    }

    // Method untuk mengupdate data admin
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'username' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
            'password' => 'nullable|string|min:8', // Password boleh kosong saat update
        ]);

        // Menemukan admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Jika ada password baru, maka hash dan simpan
        if ($request->has('password') && $request->password) {
            $admin->password = Hash::make($request->password); // Enkripsi password
        }

        // Mengupdate data admin
        $admin->update($request->except('password')); // Jangan update password kalau kosong

        // Redirect ke halaman daftar admin dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui!');
    }

    // Method untuk menghapus admin
    public function destroy($id)
    {
        // Menemukan admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Menghapus admin
        $admin->delete();

        // Redirect ke halaman daftar admin dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus!');
    }
}
