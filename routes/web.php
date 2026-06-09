<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingSessionController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout']);

#Kandidat
Route::get('/kandidat', [KandidatController::class, 'index']);
Route::get('/kandidat/tambah', [KandidatController::class, 'create']);
Route::post('/kandidat/store', [KandidatController::class, 'store']);
Route::get('/kandidat/hapus/{id}', [KandidatController::class, 'destroy']);
#admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/tambah', [AdminController::class, 'create']);
Route::post('/admin/store', [AdminController::class, 'store']);
Route::get('/admin/hapus/{id}', [AdminController::class, 'destroy']);
#voter
Route::get('/voter', [VoterController::class, 'index']);
Route::get('/voter/tambah', [VoterController::class, 'create']);
Route::post('/voter/store', [VoterController::class, 'store']);
Route::get('/voter/hapus/{id}', [VoterController::class, 'destroy']);
#mulai voiting
Route::get('/voting', [VotingController::class, 'index']);
Route::post('/vote/{id}', [VotingController::class, 'vote']);
#waktu voting
Route::get('/voting-session', [VotingSessionController::class, 'index']);
Route::post('/voting-session/store', [VotingSessionController::class, 'store']);
#hasilvoting
Route::get('/hasil', [VotingController::class, 'hasil']);
