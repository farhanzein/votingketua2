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
        $foto = $request->file('foto');
        $namaFoto = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('foto_kandidat'), $namaFoto);
        Kandidat::create([
            'nama' => $request->nama,
            'foto' => $namaFoto,
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