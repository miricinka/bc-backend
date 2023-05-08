<?php

namespace App\Http\Controllers;

use App\Mail\UserNotification;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\AttendanceDay;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where('username', '!=', 'admin')->orderBy('username')->get();
    }

    /**
     * Display the specified user by username.
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return User::where('username',$username)->first();
    }

    public function showActivities($username){
      $user =  User::where('username',$username)->first();
      return $user->activities;
    }

    /**
     * Display the specified user by username with additional information.
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $to = $request->email;
        $content = 'Přístupové údaje jsou: přihlašovací jméno: ' . $request->username . "\n heslo: " . $request->password;

        Mail::raw($content, function($message) use ($to){
            $message->to($to);
            $message->subject('Přístupové údaje');
            $message->from('your-email@gmail.com', 'Your Name');
        });

        return response()->json("User created");
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $username
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified user from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $username
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $username){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        User::where('username',$username)->first()->delete();
        return response()->json("User " . $username . " deleted");
    }

    /**
     * Change password for specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $username
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Order students by their points from activites.
     *
     * @return \Illuminate\Http\Response
     */
    public function pointsOrder(){
        return User::where('username', '!=', 'admin')->select('username')->withSum('activities', 'weight')->orderByDesc('activities_sum_weight')->get();
    }


}
