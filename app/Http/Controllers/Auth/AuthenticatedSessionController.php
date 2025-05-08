<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan tampilan login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Tangani permintaan autentikasi.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi dan regenerasi session
        $request->authenticate();
        $request->session()->regenerate();

        // Ambil peran yang dipilih dari form
        $selectedRole = $request->input('role'); 
        $user = auth()->user();

        // Cek apakah peran yang dipilih sesuai dengan peran yang dimiliki oleh pengguna
        if ($user->role === 'superadmin' && $selectedRole === 'super_admin') {
            // Redirect ke dashboard superadmin jika role cocok
            return redirect()->intended('/dashboard-superadmin');
        } elseif ($user->role === 'admin' && $selectedRole === 'admin') {
            // Redirect ke dashboard admin jika role cocok
            return redirect()->intended('/dashboard-admin');
        }

        // Jika peran tidak cocok, logout dan beri pesan error
        Auth::logout();
        return redirect()->route('login')->withErrors(['email' => 'Role tidak sesuai dengan akun.']);
    }

    /**
     * Hancurkan session autentikasi.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout dan invalidasi session
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        // Regenerasi token session untuk keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman utama setelah logout
        return redirect('/');
    }
}
