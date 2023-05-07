<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

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
}
