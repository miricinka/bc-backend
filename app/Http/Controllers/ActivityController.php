<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        return Activity::where('name',$name)->first();
    }

    /**
     * Store a newly created activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Activity::create($request->validate([ 
            'name' => ['required', 'unique:activities'],
            'weight' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Activity created");
    }

    /**
     * Update the specified activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $activity_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activity_id)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $activity = Activity::where('name',$activity_id)->first();
        $activity->update($request->validate([ 
            'name' => ['required'],
            'weight' => ['required']
        ]));

        return response()->json("Activity updated");
    }

    /**
     * Remove the specified activity from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $activity_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $activity_id){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Activity::where('name',$activity_id)->first()->delete();
        return response()->json("Activity " . $activity_id . " deleted");
    }

    /**
     * Display a listing of users and activites.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsersActivities(){
        $users =  User::where('username', '!=', 'admin')->orderBy('username')->get();
        $activities = Activity::orderBy('name')->get();
        $activitiesUsers = DB::table('activities_users')->get();
        return [
          'users' => $users,
          'activities' => $activities,
          'done' => $activitiesUsers
        ];
      }

    /**
     * Mark activity as done for a specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request){
        if($request->user()->role != 'admin'){
          return response()->json(['message' => 'Unauthorized'], 401);
        }
  
        $username = $request->input('username');
        $activity_name = $request->input('activity');
  
        $user =  User::where('username',$username)->first();
        $activity =  Activity::where('name',$activity_name)->first();
  
        $user->activities()->attach($activity);
        return response()->json("Activity marked as done");
    }
  
    /**
     * Unmark activity as done for a specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unDone(Request $request){
        if($request->user()->role != 'admin'){
          return response()->json(['message' => 'Unauthorized'], 401);
        }
        $username = $request->input('username');
        $activity_name = $request->input('activity');
  
        $user =  User::where('username',$username)->first();
        $activity =  Activity::where('name',$activity_name)->first();
  
        $user->activities()->detach($activity);
        return response()->json("Activity marked as not done");
    }
}
