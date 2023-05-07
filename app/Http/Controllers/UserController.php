<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\AttendanceDay;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::where('username', '!=', 'admin')->orderBy('username')->get();
    }

    public function show($username)
    {
        return User::where('username',$username)->first();
    }

    public function showActivities($username){
      $user =  User::where('username',$username)->first();
      return $user->activities;
    }

    public function info($username){
        $user =  User::where('username',$username)->first();
        $activities = Activity::orderBy('name')->get();
        $userActivities = $user->activities()->select('name', 'weight')->get()->makeHidden('pivot');
        $attendance = AttendanceDay::orderBy('date')->get();
        $attended = $user->attendance_days()->select('id')->get()->makeHidden('pivot');
        $tournaments = $user->tournaments()->select('id', 'title', 'date')->orderBy('date')->get();
        $points = User::where('username', '!=', 'admin')->where('username', $username)->withSum('activities', 'weight')->value('activities_sum_weight');
        $order = User::where('username', '!=', 'admin')->select('username')->withSum('activities', 'weight')->orderByDesc('activities_sum_weight')->pluck('username')->search($username);
        return [
            'activities' => $activities,
            'doneActivities' => $userActivities,
            'attendance' => $attendance,
            'attended' => $attended,
            'tournaments' => $tournaments,
            'points' => intval($points),
            'order' => $order + 1,
          ];
      }

    public function store(Request $request){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        User::create($request->validate([ 
            'username' => ['required', 'unique:users'],
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]));
        return response()->json("User created");
    }

    public function update(Request $request, $username)
    {
        if($request->user()->role != 'admin' && $request->user()->username != $username){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $user =  User::where('username',$username)->first();
        $user->update($request->validate([ 
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
        ]));
        return response()->json("User" . $username . "updated");
    }

    public function destroy(Request $request, $username){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        User::where('username',$username)->first()->delete();
        return response()->json("User " . $username . " deleted");
    }

    public function passwordChange(Request $request, $username){
        if($request->user()->role != 'admin' && $request->user()->username != $username){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user =  User::where('username',$username)->first();

        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        if (!Hash::check($currentPassword, $user->password)) {
            return response()->json('The current password is incorrect.', 401);
        }

        $user->password = Hash::make($newPassword);
        $user->save();
        return response()->json("Password changed successfully.");
    }

    public function getTokenableKeyName()
    {
        return 'username';
    }

    public function pointsOrder(){
        return User::where('username', '!=', 'admin')->select('username')->withSum('activities', 'weight')->orderByDesc('activities_sum_weight')->get();
    }


}
