<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal
        return redirect()->back()->withInput($request->only('nik', 'remember'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect ke halaman login setelah logout
    }
}
