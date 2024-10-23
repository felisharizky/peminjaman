<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function login()
    {
        return view("auth.login");
    }
    

    public function authenticate(StoreAuthRequest $request)
{
    // Validasi data request
    $credentials = $request->only('email', 'password');

    // Coba autentikasi
    if (Auth::attempt($credentials)) {
        // Ambil user yang sedang login
        $user = Auth::user();
      
        \Log::info('User authenticated:', ['user' => $user]);

        
        if ($user->role == 'admin') {
            return redirect()->route('dashboard.index');
        } elseif ($user->role == 'user') {
            return redirect()->route('pinjam.create');
        }
    }

    // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
    return redirect()->back()->withErrors(['login' => 'Email atau Password Salah.']);
}

}


