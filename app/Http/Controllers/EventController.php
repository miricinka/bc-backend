<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming = Event::where('date', '>=', now())->orderBy('date')->get();
        $passed = Event::where('date', '<', now())->orderByDesc('date')->get();
        return [
            'upcoming' => $upcoming,
            'passed' => $passed,
          ];
    }

    public function store(Request $request)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Event::create($request->validate([ 
            'date' => ['required'],
            'name' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Tournament created");
    }

    /**
     * Display the specified event by id.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $event->update($request->validate([ 
            'date' => ['required'],
            'name' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Event updated");
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $event->delete();
        return response()->json("Event deleted");
    }
}
