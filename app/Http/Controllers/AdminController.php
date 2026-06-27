<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->get();

        return view('admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'hak_suara' => 0
        ]);

        return redirect('/admin')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/admin')->with('success', 'Admin berhasil dihapus!');
    }
}