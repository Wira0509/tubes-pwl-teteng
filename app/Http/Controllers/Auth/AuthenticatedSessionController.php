<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

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
 public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    $request->session()->regenerate();

    $user = Auth::user();

    // Cek apakah user tidak login > 6 bulan
   if ($user->last_login_at && strtotime($user->last_login_at) < strtotime('-6 months')) {
    // Tandai sebagai nonaktif
    $user->is_active = false;
    $user->save();

    Auth::logout();
    return back()->withErrors(['email' => 'You have not logged in for over 6 months. Your account has been deactivated. Please contact support at Ourteam Menu.']);
}


    // Cek apakah akun aktif
    if (! $user->is_active) {
        Auth::logout();
        return back()->withErrors(['email' => 'Your account is inactive. Please contact support at Ourteam Menu.']);
    }

    // Update last login
    $user->last_login_at = now();
    $user->save();

    // Arahkan sesuai role
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/user');
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
