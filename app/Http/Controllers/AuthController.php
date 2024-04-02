<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Impor fasilitas Hash

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);
        $credentials = $request->only('username', 'password');

        Auth::attempt($credentials);
        $user = Auth::user();
        if($user){
            if ($user->isAdmin()){
                return redirect()->route('admin.dashboard');
            } elseif ($user->isPetugas()){
                return redirect()->route('petugas.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Username atau password salah']);
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'address' => 'required|text|max:255'
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Menggunakan Hash::make() untuk mengenkripsi kata sandi
            'address' => $request->address,
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
