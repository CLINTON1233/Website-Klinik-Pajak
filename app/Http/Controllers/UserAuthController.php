<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_user');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            Session::put('id_user', $user->id);
            Session::put('login_user', $user->email);

            return redirect()->route('beranda');

        } else {
            return back()->withErrors([
                'error' => 'Email atau password yang Anda masukkan salah, silahkan coba lagi',
            ]);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('user.login.form');
    }

    public function showRegistrationForm()
    {
        return view('auth.register_user');
    }


    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login.form')->with('success', true);
    }


}
