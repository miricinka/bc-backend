<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function show($name)
    {
        return Activity::where('name',$name)->first();
        //return $user;
    }
}
