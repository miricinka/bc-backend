<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
