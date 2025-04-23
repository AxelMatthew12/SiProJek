<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Level;
use App\Models\User;

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

    public function register(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'username' => 'required|string|min:3|max:50|unique:m_user,username',
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@polinema\.ac\.id$/|unique:m_user,email',
            'password' => 'required|string|min:6|confirmed',
            'level_id' => 'required|exists:m_level,level_id', // Validasi level
        ]);

        // Ambil level yang dipilih oleh user
        $level = Level::find($request->level_id);

        // Buat pengguna baru dan simpan ke database
        User::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'level_id' => $level->level_id, // Menyimpan level_id ke tabel m_user
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan Login.');
    }

    public function showRegisterForm()
    {
        // Ambil semua level dari database
        $levels = Level::all();
        return view('auth.register', compact('levels'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
