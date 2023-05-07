<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AttendanceDay;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities(){
        return $this->belongsToMany(Activity::class, 'activities_users', 'username', 'activity');
    }

    public function attendance_days(){
        return $this->belongsToMany(AttendanceDay::class, 'attendence_days_users', 'username', 'attendance_day_id');
    }

    public function tournaments(){
        return $this->belongsToMany(Tournament::class, 'tournaments_users', 'username', 'tournament_id');
    }
}
