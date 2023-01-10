<?php
//Created by Sebastián Bencsík

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use Illuminate\Validation\Rule;
use App\Models\Game;

class GameController extends Controller
{
    public function index(){
        return Game::all();
    }

    public function show($id){
        return Game::where('listing_id','=',$id)->get();
    }

    public function store(GameRequest $request)
    {
        $game = Game::where([['first_team_id','=',$request->first_team_id],['second_team_id','=', $request->second_team_id],['listing_id','=', $request->listing_id]])->first();
        if(is_null($game))
            return new GameResource(Game::create($request->all()));
        else
            $game->update($request->all());
    }
}
