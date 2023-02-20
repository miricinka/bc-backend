<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDay;
use Illuminate\Http\Request;


class AttendanceDayController extends Controller
{
    public function store(Request $request){

        AttendanceDay::insert($request->all());
        return response()->json("Dates added");
    }

    public function destroy(AttendanceDay $day){

        $day->delete();
        return response()->json("Day deleted");
    }
}
