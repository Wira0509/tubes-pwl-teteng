<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Tampilkan form gabungan login dan register
    public function showLoginRegisterForm()
    {
        return view('loginandregister');
    }

    // Tampilkan form pendaftaran
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses pendaftaran
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.form')
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.form')->with('success', 'Registrasi berhasil. Silahkan login.');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('loginandregister');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.form')
                ->withErrors($validator, 'login')
                ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data user ke session
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);

            return redirect()->route('home');
        } else {
            return redirect()->route('auth.form')
                ->withErrors(['email' => 'Email atau password salah. Silahkan coba lagi.'], 'login')
                ->withInput();
        }
    }

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
