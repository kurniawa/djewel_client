<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login() {
        return view('login.login');
    }
    public function authenticate(Request $request)
    {
        // dump($post);
        $credentials=$request->validate([
            "username"=>"required",
            "password"=>"required"
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('failed', 'Login gagal!');
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
