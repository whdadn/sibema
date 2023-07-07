<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function ubahPass($token)
    {
        return view('ubahPassword')->with(['token' => $token]);;
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
        $user->password = Hash::make($newPassword);
        $user->save();


        return redirect('/login');
    }

    public function showLupaPass()
    {
        return view('lupaPassword');
    }

    public function lupaPass(Request $request)
    {
        $this->validateEmail($request);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('gagal', 'Email tidak terdaftar');
        }

        $token = Str::random(60);
        $user->remember_token = $token;
        $user->save();

        $this->sendEmail($user, $token);

        return redirect()->back()->with('berhasil', 'Link berhasil dikirim');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    protected function sendEmail($user, $token)
    {
        // Kirim email ke pengguna dengan link reset password
        // Misalnya, menggunakan fasilitas Mail Laravel
        Mail::send('showPassword', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Lupa Password');
        });
    }
}
