<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    public function index()
    {
        $voter = User::where('role', 'voter')->get();

        return view('voter.index', compact('voter'));
    }

    public function create()
    {
        return view('voter.tambah');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'voter',
            'hak_suara' => 1
        ]);

        return redirect('/voter');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/voter');
    }
}