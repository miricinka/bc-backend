<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\User;
use App\Http\Resources\V1\NewsCollection;
use App\Http\Resources\V1\NewsResource;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivitiesUsersController extends Controller
{
    public function getUsersActivitiesTable(){
      $users =  User::where('username', '!=', 'admin')->orderBy('username')->get();
      $activities = Activity::orderBy('name')->get();
      $activitiesUsers = DB::table('activities_users')->get();
      return [
        'users' => $users,
        'activities' => $activities,
        'done' => $activitiesUsers
      ];
    }

    public function done(Request $request){
      $username = $request->input('username');
      $activity_name = $request->input('activity');

      $user =  User::where('username',$username)->first();
      $activity =  Activity::where('name',$activity_name)->first();

      $user->activities()->attach($activity);
      return response()->json("Activity marked as done");
    }

    public function unDone(Request $request){
      $username = $request->input('username');
      $activity_name = $request->input('activity');

      $user =  User::where('username',$username)->first();
      $activity =  Activity::where('name',$activity_name)->first();

      $user->activities()->detach($activity);
      return response()->json("Activity marked as not done");
    }
}