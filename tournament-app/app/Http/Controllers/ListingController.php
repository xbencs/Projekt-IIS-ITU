<?php
//TODO:

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
        $teams = DB::select('
        select f.name as first , s.name as second 
        from games g
        INNER JOIN teams f on g.first_team_id = f.id 
        INNER JOIN teams s on g.second_team_id = s.id 
        where g.listing_id = ? ;', [$listing->id]);
        
        $results = DB::select('select first_score, second_score from games where listing_id = ?', [$listing->id]);
        // $i =0;
        // foreach($games as $game){
        //     $teams[$i][0] = $game[3];
        //     $teams[$i][1] = $game[4];
        //     $i +=1;
        // }
        // echo json_encode($teams);
        return view('listings.show', [
            'listing' => $listing,
            'teams' => $teams,
            'results' => $results
        ]);

    }

    //show create form
    public function create(){
        return view('listings.create');

    }

    //store listing data
    public function store(Request $request){ //title = nazov, company=
        $formFields = $request->validate([
            'title' => 'required',
            'date' => '',
            'location' => 'required',
            'email' => ['required', 'email'],
            'sport' => '',
            'conditions' => 'required',
            'max_players' => 'required',
            'descriptions' => 'required',
            'prize' => '',
            'winner' => '',
            'website' => 'required',
            //'approved' => '',
        ]);

        /*if($request['approved'] === 'yes'){
            $formFields['approved'] = true;
        }else{
            $formFields['approved'] = false;
        }*/

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // this will make file named logos with all the uploaded logos(storage/app/public/logos)
                                                                                    // after new tournament with logo is created run: php artisan storage:link

        }

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
        if($listing->user_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'date' => '',
            'location' => 'required',
            'email' => ['required', 'email'],
            'sport' => '',
            'conditions' => 'required',
            'max_players' => 'required',
            'descriptions' => 'required',
            'prize' => '',
            'winner' => '',
            'website' => 'required',
            //'approved' => '',
        ]);

        /*if($request['approved'] === 'yes'){
            $formFields['approved'] = true;
        }else{
            $formFields['approved'] = false;
        }*/

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); 
        }

        $listing->update($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

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

}
