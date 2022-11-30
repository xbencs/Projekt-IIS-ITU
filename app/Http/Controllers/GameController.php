<?php

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

    public function store(GameRequest $request)
    {
        $game = Game::where([['first_team_id','=',$request->first_team_id],['second_team_id','=', $request->second_team_id],['listing_id','=', $request->listing_id]])->first();
        if(is_null($game))
            return new GameResource(Game::create($request->all()));
        else
            $game->update($request->all());
    }
    /* public function update(Request $request, Team $listing){
        //make sure logged in user is owner!
        if($listing->user_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'first_team_id' => 'required',
            'second_team_id' => 'required',
            'first_score' => 'required',
            'second_score' => 'required',
        ]);

        // $formFields['listing_id'] = $listing->id;
        //Game::create($formFields);
        DB::insert('insert into games (first_score, second_score,first_team_id, second_team_id, listing_id) values (?, ?,?,?,?)', [$formfields['first_score'], $formfields['second_score'],$formfields['first_team_id'],$formfields['second_team_id'],$listing_id]);
        // DB::statement('
        //             INSERT INTO games (first_score, second_score,first_team_id,second_team_id,listing_id)
        //             values ( ?, ?, ?, ?, ?)
        //         ', $formfields['first_score'], $formfields['second_score'],$formfields['first_team_id'],$formfields['second_team_id'],$listing_id);

        return redirect('/listings/'.$listing->id)->with('message', 'successfully');
    } */
    /* public function update(Request $request,$listing)
    {
        $json = json_decode($request,true);
        foreach ($json as $innerArray){
            if ($innerArray[0] != null && $innerArray[1] != null) {
                $first_score = $innerArray[0];
                $second_score = $innerArray[1];
                $first_name = $innerArray[2];
                $second_name = $innerArray[3];

                DB::insert('
                    INSERT INTO games (first_score, second_score,first_team_id,second_team_id,listing_id)
                    values ( ?, ?, ?, ?, ?)
                ', $first_score, $second_score,$first_team_id,$second_team_id,$listing_id,);
                return 
            }
        }

    } */
}
