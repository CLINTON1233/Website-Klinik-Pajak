<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\TbAdmin; // Menggunakan model TbAdmin

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
        ];

        $admin = TbAdmin::where('username', $request->username)->first(); // Mengambil admin berdasarkan username

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                'error' => 'Username atau password yang Anda masukkan salah, silahkan coba lagi',
            ]);
        }

        // Auth::login($admin); // Login menggunakan model Admin langsung
        Auth::guard('admin')->login($admin); // Login menggunakan guard admin

        // Redirect ke halaman yang diinginkan setelah login berhasil
        return redirect()->route('dashboard');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_admin,username',
            'password' => 'required|confirmed',
        ]);

        $user = new TbAdmin();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil. Silahkan login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout menggunakan guard admin
        Session::flush();

        return redirect()->route('login');
    }
}
