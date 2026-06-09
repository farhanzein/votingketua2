<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VotingSession;

class VotingSessionController extends Controller
{
    public function index()
    {
        $session = VotingSession::first();

        return view('voting_session.index', compact('session'));
    }

    public function store(Request $request)
    {
        VotingSession::updateOrCreate(
            ['id' => 1],
            [
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'status' => $request->status
            ]
        );

        return redirect('/voting-session');
    }
}