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
}
