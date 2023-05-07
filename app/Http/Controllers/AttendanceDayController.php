<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDay;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AttendanceDayController extends Controller
{
    /**
     * Store a newly created attendance day in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        AttendanceDay::insert($request->all());
        return response()->json("Dates added");
    }

    /**
     * Remove the specified attendance day from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttendanceDay $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AttendanceDay $day){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $day->delete();
        return response()->json("Day deleted");
    }

    /**
     * Display whole attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $users =  User::where('username', '!=', 'admin')->orderBy('username')->get();
        $attendanceDays = AttendanceDay::orderBy('date')->get();
        $attendanceUsers = DB::table('attendence_days_users')->get();
        return [
          'users' => $users,
          'attendanceDays' => $attendanceDays,
          'attendance' => $attendanceUsers
        ];
    }

    /**
     * Mark user and specific attendance day as attended.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attend(Request $request){
      if($request->user()->role != 'admin'){
        return response()->json(['message' => 'Unauthorized'], 401);
      }

        $username = $request->input('username');
        $attendance_day_id = $request->input('attendance_day_id');
  
        $user =  User::where('username',$username)->first();
        $attendanceDay = AttendanceDay::find($attendance_day_id);
  
        $user->attendance_days()->attach($attendanceDay);
        return response()->json("Attendance created");
    }
  
    /**
     * Unmark user and specific attendance day as attended.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unattend(Request $request){
      if($request->user()->role != 'admin'){
        return response()->json(['message' => 'Unauthorized'], 401);
      }
      $username = $request->input('username');
      $attendance_day_id = $request->input('attendance_day_id');
  
      $user =  User::where('username',$username)->first();
      $attendanceDay = AttendanceDay::find($attendance_day_id);
  
      $user->attendance_days()->detach($attendanceDay);
      return response()->json("Activity marked as not done");
    }
}
