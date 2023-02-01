<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\User;
use App\Http\Resources\V1\NewsCollection;
use App\Http\Resources\V1\NewsResource;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('username')->get();
    }

    public function show($username)
    {
        return User::where('username',$username)->first();
        //return $user;
    }

    public function showActivities($username){
      $user =  User::where('username',$username)->first();
      return $user->activities;
    }
}