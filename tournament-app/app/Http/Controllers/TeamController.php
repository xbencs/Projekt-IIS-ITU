<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function index(){
        return view('teams.registered_teams', [
            'teams' => Team::all()
        ]);

    }
    public function show(Team $team)
    {
        return view('teams.team', [
            'team' => $team,
            'owner' => User::find($team->owner_id),
            'users' => User::where('current_team_id','=',$team->id)->get()
        ]);

        // $team = ['User 1','User 2','User 3'];
        // return view('team.manage', ['team' => $team]);
        // return view('team.manage', ['team' => $team]);
    } 

    public function create(){
        return view('team.create');

    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'players' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // this will make file named logos with all the uploaded logos(storage/app/public/logos)
                                                                                    // after new tournament with logo is created run: php artisan storage:link

        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return redirect('/')->with('message', 'Team created successfully!');
    }

    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Team $team){
        //make sure logged in user is owner!
        if($team->user_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'players' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); 
        }

        $listing->update($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return back()->with('message', 'Listing updated successfully!');
    }

    public function manage(){
        $teams = ['User 1','User 2','User 3'];
        return view('team.manage', ['team' => $teams]);
    }
}
