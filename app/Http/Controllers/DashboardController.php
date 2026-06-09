<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Suara;
use App\Models\VotingSession;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVoter    = User::where('role', 'voter')->count();
        $sudahVoting   = User::where('role', 'voter')->where('hak_suara', 0)->count();
        $belumVoting   = User::where('role', 'voter')->where('hak_suara', 1)->count();
        $totalSuara    = Suara::count();
        $session       = VotingSession::latest()->first();

        return view('dashboard.dashboard', compact(
            'totalVoter',
            'sudahVoting',
            'belumVoting',
            'totalSuara',
            'session'
        ));
    }
}