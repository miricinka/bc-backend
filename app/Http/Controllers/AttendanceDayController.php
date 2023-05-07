<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDay;
use Illuminate\Http\Request;


class AttendanceDayController extends Controller
{
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
}
