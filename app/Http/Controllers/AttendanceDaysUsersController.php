<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDay;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttendanceDaysUsersController extends Controller
{
    public function getAttendanceUsersTable(){
        $users =  User::orderBy('username')->get();
        $attendanceDays = AttendanceDay::orderBy('date')->get();
        $attendanceUsers = DB::table('attendence_days_users')->get();
        return [
          'users' => $users,
          'attendanceDays' => $attendanceDays,
          'attendance' => $attendanceUsers
        ];
    }

    public function add(Request $request){
        $username = $request->input('username');
        $attendance_day_id = $request->input('attendance_day_id');
  
        $user =  User::where('username',$username)->first();
        $attendanceDay = AttendanceDay::find($attendance_day_id);
  
        $user->attendance_days()->attach($attendanceDay);
        return response()->json("Attendance created");
      }
  
      public function delete(Request $request){
        $username = $request->input('username');
        $attendance_day_id = $request->input('attendance_day_id');
  
        $user =  User::where('username',$username)->first();
        $attendanceDay = AttendanceDay::find($attendance_day_id);
  
        $user->attendance_days()->detach($attendanceDay);
        return response()->json("Activity marked as not done");
      }


}
