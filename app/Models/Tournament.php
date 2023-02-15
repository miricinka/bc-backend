<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'date', 'description'];
    protected $hidden = ['pivot'];

    public function users(){
        return $this->belongsToMany(User::class, 'tournaments_users', 'tournament_id', 'username');
    }
}
