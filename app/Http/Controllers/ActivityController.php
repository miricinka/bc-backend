<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function show($name)
    {
        return Activity::where('name',$name)->first();
        //return $user;
    }

    public function store(Request $request){
        //return response()->json("Activity created");
        Activity::create($request->validate([ 
            'name' => ['required', 'unique:activities'],
            'weight' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Activity created");
    }

    public function update(Request $request, $activityName)
    {
        $activity = Activity::where('name',$activityName)->first();
        $activity->update($request->validate([ 
            'weight' => ['required']
        ]));

        return response()->json("Activity updated");
    }

    public function destroy($activityName){

        Activity::where('name',$activityName)->first()->delete();
        return response()->json("Activity " . $activityName . " deleted");
    }
}
