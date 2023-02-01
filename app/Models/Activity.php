<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['name', 'weight', 'description'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
