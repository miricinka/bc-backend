<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Store a newly created game in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Game::create($request->all());
        return response()->json("Game created");
    }

    /**
     * Update the specified game in storage.
     * Or create a new one when there is none.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->user()->role != 'admin'){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $game = Game::where('tournament_id', '=', $request['tournament_id'])->where('white', '=', $request['white'])->where('black', '=', $request['black'])->first();
        if(!$game){
            $this->store($request);
            return response()->json("Game created");
        }
        $game->update($request->all());
        return response()->json('Game updated');
    }

    /**
     * Display the specified game by id.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return $game;
    }


}
