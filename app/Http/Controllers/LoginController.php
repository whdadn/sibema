<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'Mahasiswa') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboardMhs');
            }

            if (Auth::user()->role === 'Admin Prodi') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboardAdmin');
            }
        }
        return back()->with('loginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('laravel_session'));

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->withCookie(Cookie::forget('laravel_session'));
    }

    public function ubahPass()
    {
        return view('ubahPassword');
    }

    public function rubahPass(Request $request)
    {
        $username = $request->input('username');
        $newPassword = $request->input('passbaru');

        $user = User::where('username', $username)->first();

        if (!$user) {
            return back()->with('gagal', 'Username tidak terdaftar');
        }

        // Ubah password
        $user->password = bcrypt($newPassword);
        $user->save();

        return redirect('/login');
    }

    public function showLupaPass()
    {
        return view('lupaPassword');
    }

    public function lupaPass()
    {
        return view('lupaPassword');
    }
}
