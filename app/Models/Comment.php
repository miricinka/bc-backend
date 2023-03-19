<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'news_id', 'username'];

    public function news(){
        return $this->belongsTo(News::class);
    }
}
