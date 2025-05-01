<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Make sure to import the Admin model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to show the "Manajemen Admin" page
    public function index()
    {
        // Fetch all admins from the database
        $admins = Admin::all();

        // Return the view with the admins data
        return view('superadmin.manajemen_admin', compact('admins'));
    }

    // Method to handle storing new admin data
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create a new admin entry in the database
        $admin = new Admin([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        // Save the new admin
        $admin->save();

        // Redirect back to the admin management page with a success message
        return redirect()->route('admin.index')->with('success', 'Admin added successfully!');
    }
}
