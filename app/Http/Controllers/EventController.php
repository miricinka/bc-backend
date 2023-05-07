<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
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

    public function show(Event $event)
    {
        return $event;
    }

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

    public function destroy(Request $request, Event $event)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $event->delete();
        return response()->json("Event deleted");
    }
}
