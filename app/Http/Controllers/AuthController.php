<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // dd('hallo');

        return view('login');
    }

    public function postLogin(Request $request)
    {
        // dd('hai');
        $email = $request->email;
        $password = $request->password;

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        $doLogin = Auth::attempt($credentials);

        if ($doLogin) {
            return redirect('/homepage');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
