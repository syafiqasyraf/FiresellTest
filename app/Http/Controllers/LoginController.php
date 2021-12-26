<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Unsuccessfull. Try Again');
    }
    public function logout( Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}
