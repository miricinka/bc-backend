<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\User;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tournament::withCount('users')->with(['users' => function ($query) {
            $query->select('users.username');
        }])->orderBy('date')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tournament::create($request->validate([ 
            'date' => ['required'],
            'title' => ['required'],
            'description' => 'nullable',
        ]));
        return response()->json("Tournament created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return Tournament::with('users', 'games')->find($tournament)->first();
        //return $tournament::withCount('users')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $tournament->update($request->validate([ 
            'date' => ['required'],
            'title' => ['required'],
            'description' => 'nullable',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return response()->json("Tournament deleted");
    }

    public function addUser(Tournament $tournament, Request $request){
        $username = $request->input('username');
  
        $user =  User::where('username',$username)->first();

        $tournament->users()->attach($user);

        return response()->json('user signed into tournament');

    }

    public function deleteUser(Tournament $tournament, Request $request){
        $username = $request->input('username');
  
        $user =  User::where('username',$username)->first();

        $tournament->users()->detach($user);

        return response()->json('user signed off tournament');
    }


}
