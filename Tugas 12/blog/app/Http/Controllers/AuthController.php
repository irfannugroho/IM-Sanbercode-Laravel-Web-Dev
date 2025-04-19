<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        $roleData = User::count();
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $roleData == 0 ? 'admin' : 'user'; 
        $user->save();

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

        // Jika ada password yang tidak sesuai
        return redirect()->back()->withErrors(['error' => 'Registrasi gagal, periksa kembali data Anda.']);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Jika login berhasil, set session
            $request->session()->regenerate();
            
            // Redirect ke halaman dashboard
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        // Jika gagal login
        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('error', 'Logout berhasil!');
    }
}

