<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\User;

class TournamentController extends Controller
{
    /**
     * Display a listing of tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tournament::withCount('users')->with(['users' => function ($query) {
            $query->select('users.username');
        }])->orderByDesc('date')->get();
    }

    /**
     * Store a newly created tournament in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Tournament::create($request->validate([ 
            'date' => ['required'],
            'title' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Tournament created");
    }

    /**
     * Display the specified tournament.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return Tournament::with(['users' => function($query) {
            $query->orderBy('tournaments_users.created_at', 'asc');
        }, 'games'])->find($tournament)->first();
    }

    /**
     * Update the specified tournament in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $tournament->update($request->validate([ 
            'date' => ['required'],
            'title' => ['required'],
            'description' => 'nullable',
        ]));
    }

    /**
     * Remove the specified tournament from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tournament $tournament)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $tournament->delete();
        return response()->json("Tournament deleted");
    }

    /**
     * subscribe user to a specific tournament.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function addUser(Tournament $tournament, Request $request){
        $username = $request->input('username');
  
        $user =  User::where('username',$username)->first();

        $tournament->users()->attach($user);

        return response()->json('user signed into tournament');

    }

    /**
     * unsubscribe user from a specific tournament.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Tournament $tournament, Request $request){
        $username = $request->input('username');
  
        $user =  User::where('username',$username)->first();

        $tournament->users()->detach($user);

        return response()->json('user signed off tournament');
    }


}
