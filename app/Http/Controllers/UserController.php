<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\User;
use App\Http\Resources\V1\NewsCollection;
use App\Http\Resources\V1\NewsResource;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
        $userActivities = $user->activities;
        return [
            'activities' => $activities,
            'done' => $userActivities,
          ];
      }

    public function store(Request $request){
        User::create($request->validate([ 
            'username' => ['required'],
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
        ]));
        return response()->json("User created");
    }

    public function update(Request $request, $username)
    {
        $user =  User::where('username',$username)->first();
        $user->update($request->validate([ 
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
        ]));
        return response()->json("User" . $username . "updated");
    }

    public function destroy($username){

        User::where('username',$username)->first()->delete();
        return response()->json("User " . $username . " deleted");
    }

    public function passwordChange(Request $request, $username){
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
}
