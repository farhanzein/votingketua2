<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;

class KandidatController extends Controller
{
    // tampil kandidat
    public function index()
    {
        $kandidat = Kandidat::all();

        return view('kandidat.index', compact('kandidat'));
    }

    // form tambah kandidat
    public function create()
    {
        return view('kandidat.tambah');
    }

    // simpan kandidat
    public function store(Request $request)
    {
        Kandidat::create([
            'nama' => $request->nama,
            'foto' => $request->foto,
            'visi' => $request->visi,
            'misi' => $request->misi
        ]);

        return redirect('/kandidat');
    }

    // hapus kandidat
    public function destroy($id)
    {
        Kandidat::find($id)->delete();

        return redirect('/kandidat');
    }
}