<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\VotingController;

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

#mulai voiting
Route::get('/voting', [VotingController::class, 'index']);
Route::post('/vote/{id}', [VotingController::class, 'vote']);
#hasilvoting
Route::get('/hasil', [VotingController::class, 'hasil']);
