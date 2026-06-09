<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Suara;
use App\Models\VotingSession;
class VotingController extends Controller
{
    public function index()
    {
        // admin tidak boleh voting
        if (auth()->user()->role == 'admin') {
            return redirect('/dashboard');
        }

        $kandidat = Kandidat::all();

        return view('voting.index', compact('kandidat'));
    }

    public function vote($id)
    {
        $user = auth()->user();

        $session = VotingSession::first();

        // cek voting
        if (!$session || $session->status != 'buka') {
            return redirect('/voting')
                ->with('error', 'Voting sedang ditutup');
        }

        // cek sudah voting
        if ($user->hak_suara == 0) {
            return redirect('/voting')
                ->with('error', 'Anda sudah voting');
        }

        Suara::create([
            'userid' => $user->id,
            'kandidatid' => $id
        ]);

        $user->hak_suara = 0;
        $user->save();

        return redirect('/dashboard')
            ->with('success', 'Voting berhasil');
    }
    public function hasil()
    {
        $kandidat = Kandidat::all();

        return view('hasil.index', compact('kandidat'));
    }
}
