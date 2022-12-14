<?php
//Created by Jasmína Csalová

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Listing;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4) //paginate can be replaced with get
        ]);

    }

    // show single listing
    public function show(Listing $listing){
        // $games = Game::where('listing_id','=',$listing->id)->get();
        /* 
        $teams = DB::select('
        select f.name as first , s.name as second 
        from games g
        INNER JOIN teams f on g.first_team_id = f.id 
        INNER JOIN teams s on g.second_team_id = s.id 
        where g.listing_id = ? ;', [$listing->id]);
         */
        $results = DB::select('select first_score, second_score from games where listing_id = ?', [$listing->id]);
        // $i =0;
        // foreach($games as $game){
        //     $teams[$i][0] = $game[3];
        //     $teams[$i][1] = $game[4];
        //     $i +=1;
        // }
        // echo json_encode($teams);
        if($listing->collective)
            return view('listings.show', [
                'listing' => $listing,
                'teams' => $listing->approved_teams,
                'results' => $results
            ]);
        else
            return view('listings.show', [
                'listing' => $listing,
                'users' => $listing->approved_users,
                'results' => $results
            ]);

    }

    //show create form
    public function create(){
        return view('listings.create');

    }

    //store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'date' => '',
            'location' => 'required',
            'email' => ['required', 'email'],
            'sport' => '',
            'conditions' => '',
            'max_players' => 'required',
            'descriptions' => 'required',
            'prize' => '',
            'winner' => '',
            'website' => 'required',
            'approved' => '',
            'collective' => 'required',
        ]);

        if($request['collective'] === "true"){
            $formFields['collective'] = 1;
        }else{
            $formFields['collective'] = 0;
        }


        $formFields['approved'] = false;

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing){
        //make sure logged in user is owner!
        if($listing->user_id != auth()->id() && auth()->user()->is_admin != 1){
            abort(403, 'Unathorized Action');
        }

        if(auth()->id() == $listing->user_id){
            $formFields = $request->validate([
                'title' => 'required',
                'date' => '',
                'location' => 'required',
                'email' => ['required', 'email'],
                'sport' => '',
                'conditions' => '',
                'max_players' => 'required',
                'descriptions' => 'required',
                'prize' => '',
                'winner' => '',
                'website' => 'required',
            ]);
        }
        

        if(auth()->user()->is_admin == 1){
            if($request['approved'] === "false"){
                $formFields['approved'] = 0;
            }else{
                $formFields['approved'] = 1;
            }
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    //delete listing
    public function destroy(Listing $listing){
        //make sure logged in user is owner or admin!
        if($listing->user_id != auth()->id() && auth()->user()->is_admin == false){
            abort(403, 'Unathorized Action');
        } 
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
        
    }

    //manage listings
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

    //
    public function request_join(Listing $listing, Request $request){
        //syncWithoutDetaching adds row to pivot table preventing from adding duplicate rows
        //https://stackoverflow.com/questions/17472128/preventing-laravel-adding-multiple-records-to-a-pivot-table
        if ($listing->collective) {
            auth()->user()->member()->participate_listings()->syncWithoutDetaching($listing->id);
        }else{
            auth()->user()->participate_listings()->syncWithoutDetaching($listing->id);
        }
        return view('listings.request_join', ['listing' => $listing]);
    }

    //show participants on tournament
    public function participants(Listing $listing){
        if ($listing->collective) {
            return view('listings.participants', [
                'teams' => $listing->participated_teams,
                'listing' => $listing,
            ]);
        }
        return view('listings.participants', [
            'users' => $listing->participated_users,
            'listing' => $listing,
        ]);
    }
}
