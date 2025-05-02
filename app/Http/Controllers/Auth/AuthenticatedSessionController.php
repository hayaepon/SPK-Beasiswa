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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $selectedRole = $request->input('role'); // role dari dropdown
    $user = auth()->user();

    // Cek apakah role yang dipilih sesuai dengan role user yang login
    if ($user->role === 'superadmin' && $selectedRole === 'super_admin') {
        return redirect()->intended('/dashboard-superadmin');
    } elseif ($user->role === 'admin' && $selectedRole === 'admin') {
        return redirect()->intended('/dashboard-admin');
    }

    // Role tidak cocok (misalnya user admin memilih superadmin) -> logout dan tampilkan error
    Auth::logout();
    return redirect()->route('login')->withErrors(['email' => 'Role tidak sesuai dengan akun.']);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
