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
            'owner' => User::find($team->owner_id)->first(),
            'users' => User::where('current_team_id','=',$team->id)->get()
        ]);

        // $team = ['User 1','User 2','User 3'];
        // return view('team.manage', ['team' => $team]);
        // return view('team.manage', ['team' => $team]);
    } 

    public function create(){
        return view('teams.register');

    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = request()->file('logo')->store('logos', 'public'); // this will make file named logos with all the uploaded logos(storage/app/public/logos)
                                                                                    // after new tournament with logo is created run: php artisan storage:link

        }

        $formFields['owner_id'] = auth()->id();

        $team = Team::create($formFields);
        
        auth()->user()->update(['current_team_id'=> $team->id]);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return redirect('/')->with('message', 'Team created successfully!');
    }

    //show edit form
    public function edit(Team $team){
        return view('teams.edit', ['team' => $team]);
    }

    public function update(Request $request, Team $team){
        //make sure logged in user is owner!
        if($team->owner_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); 
        }

        $team->update($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return back()->with('message', 'Team updated successfully!');
    }

    public function kick(Team $team,User $user){
        //make sure logged in user is owner or admin!

        if($team->owner_id != auth()->id() && auth()->user()->is_admin == false){
            abort(403, 'Unathorized Action');
        } 

        $user->update(['current_team_id'=> NULL]);
        return redirect('/teams/'.$team->id.'/manage')->with('message', 'Member removed successfully');
        
    }

    public function add(Request $request,Team $team){
        //make sure logged in user is owner or admin!
        if($team->owner_id != auth()->id() && auth()->user()->is_admin == false){
            abort(403, 'Unathorized Action');
        } 
        $formFields = $request->validate([
            'name' => 'required',
        ]);
        $user = User::where('name','=',$formFields['name'])->first();
        if ($user!= NULL) {
            if($user->current_team_id != NULL)
            {
                return redirect('/teams/'.$team->id.'/manage')->with('message', 'Member is already in team');
            }
            $user->update(['current_team_id'=> $team->id]);
            return redirect('/teams/'.$team->id.'/manage')->with('message', 'Member added successfully');
        }
        else {
            return redirect('/teams/'.$team->id.'/manage')->with('message', 'User does not exist!');
        }
    }

    public function manage(Team $team){
        return view('teams.manage', [
            'team' => $team,
            'users' => User::where('current_team_id','=',$team->id)->get()
        ]);
    }
}
