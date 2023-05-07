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

    public function update(Request $request, $activityName)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $activity = Activity::where('name',$activityName)->first();
        $activity->update($request->validate([ 
            'weight' => ['required']
        ]));

        return response()->json("Activity updated");
    }

    public function destroy(Request $request, $activityName){
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Activity::where('name',$activityName)->first()->delete();
        return response()->json("Activity " . $activityName . " deleted");
    }
}
