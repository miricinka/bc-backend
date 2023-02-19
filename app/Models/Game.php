<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $fillable = ['tournament_id','black', 'white', 'winner', 'pgn'];

    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }
}
