<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login1');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'username'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('loket_antrian');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // public function postlogin(Request $request)
    // {
    //     if (Auth::attempt($request->only('username', 'password'))) {
    //         return redirect('/loket_antrian');
    //     }
    //     return redirect('/login');
    // }

    // public function logout()
    // {
    //     Auth::logout();

    //     return redirect('/login');
    // }
}
