<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotingSession extends Model
{
    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];
}