<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // Jika sudah login, maka redirect ke halaman home
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
    
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status'   => true,
                    'message'  => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
    
            return response()->json([
                'status'  => false,
                'message' => 'Username atau Password salah',
                'msgField' => [
                    'username' => ['Periksa kembali username Anda'],
                    'password' => ['Periksa kembali password Anda']
                ]
            ]);
        }
    
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
