<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function store(Request $request)
    {
        Game::create($request->all());
        return response()->json("Game created");
    }

    public function update(Request $request)
    {
        $game = Game::where('tournament_id', '=', $request['tournament_id'])->where('white', '=', $request['white'])->where('black', '=', $request['black'])->first();
        if(!$game){
            $this->store($request);
            return response()->json("Game created");
        }
        $game->update($request->all());
        return response()->json('Game updated');
    }


}
