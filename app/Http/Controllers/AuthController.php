<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // tampil login
    public function showLogin()
    {
        return view('login.login'); 
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // tampil register
    public function showRegister()
    {
        return view('register.register'); 
    }

    // proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'hak_suara' => 1
        ]);

        return redirect('/')->with('success', 'Register berhasil, silakan login');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    
}