
<x-layout>
    @include('partials._search')
        
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"        
                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/image/no-image.png')}}"
                alt=""
            />
    
            <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
    
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                <i class="far fa-calendar-alt"></i> {{$listing->date}}

            </div>
    
    
            {{--button to enter tournament--}}
            @if ($listing->collective)
            <div >
                <a href="/listings/{{$listing->id}}/request_join"
                    class="mt-6 py-4">
                    <i class="fa-solid fa-code-merge"></i> 
                    Join Tournament as Team
                </a>
            </div>
            @else 
                <div >
                    <a href="/listings/{{$listing->id}}/request_join"
                      class="mt-6 py-4">
                      <i class="fa-solid fa-code-merge"></i> 
                      Join Tournament as Player
                    </a>
                </div>
            @endif
    
    
            <div class="border border-gray-200 w-full mb-6"></div>
            
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Tournament Description
                </h3>
                <div class="text-lg space-y-6">
                   {{$listing->descriptions}}
    
                   @if ($listing->conditions)
                   <div>
                       <h3 class="text-1xl font-bold">
                           Conditions: {{$listing->conditions}}
                       </h3>
                   </div>
               @endif
    
               @if ($listing->prize)
                   <div>
                           <h3 class="text-1xl font-bold">
                               <i class="fas fa-award"></i> Prize: {{$listing->prize}}
                           </h3>
                   </div>
               @endif
    
                    <a
                        href="mailto:{{$listing->email}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Organizer</a
                    >
    
                    <a
                        href="{{$listing->website}}"
                        target="_blank"
                        class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
    
                    <div class="mb-10">
                        Approval:
                       @if($listing->approved === 1)
                           <span>&#10003;</span>  
                       @else
                           <i class="fa fa-close"></i>
                       @endif
                   </div>
    
                   <a 
                        href="/listings/{{$listing->id}}/edit"
                        class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fas fa-pen"></i> 
                        Edit approval
                    </a>
    
                    <a  href="/listings/{{$listing->id}}/participants"
                        class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fas fa-users"></i>
                        Show Players/Teams
                        </a>
    
                </div>
            </div>
        </div>
    </x-card>
        
    <x-card class="mt-4 p-2 flex space-x-6">
    

<x-card class="mt-4 p-2 flex space-x-6">

    <form method="POST" action="/listings/{{$listing->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
</x-card>
@if($listing->user_id == auth()->id())
<x-card>
    <form method="POST" action="/listings/{{$listing->id}}/game" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="mb-6">

                <label for="first_team_id">Choose team:</label>
                
                <select name="first_team_id">
                    @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>    
                    @endforeach
                </select>

                <label for="first_score">score:</label>
                <input type="number" id="first_score" name="first_score" min="0" max="99">

                <label for="second_score">:</label>
                <input type="number" id="second_score" name="first_score" min="0" max="99">

                <label for="second_team_id">Choose team:</label>

                <select name="second_team_id">
                    @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>    
                    @endforeach
                </select>
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Add score
                </button>
            </div>

            
        </form>
    </x-card>
@endif
{{-- {{  $games }} --}}
<script type="text/javascript">
    var data ={{ Js::from($teams)}}
    // console.log(data[0].name);
    
    for (let index = 0; index < data.length; index++) {
        var match = new Array;
        if(data[index]!= null)
            match.push(data[index].name);
        index++;
        if(data[index]!= null)
            match.push(data[index].name);
        else
            match.push(null);
        autoCompleteData.teams.push(match);
    }
    /* for (let index = 0; index < {{$listing->max_players/2}}; index++) {
        autoCompleteData.teams.push([data[index].first,data[index].second]);
    } */

    var tmp = {{$listing->max_players}};
    var max_rounds = 1;
    while (tmp >1 ) {
        tmp = tmp/2;
        max_rounds +=1;
    }
    var max_players= {{$listing->max_players}};
    var data_results ={{ Js::from($results)}}
    
    var id=0;
    for (let roundCount = 1; roundCount < max_rounds; roundCount++) {
        max_players = max_players/2;
        var round_results = new Array;
        for (let index = 0; index < max_players; index++) {
            if(typeof data_results[id] !== 'undefined')
            {
                if (typeof  data_results[id].first_score == 'undefined' && typeof data_results[id].second_score !== 'undefined')
                    round_results.push([null,data_results[id].second_score]);
                if (typeof data_results[id].first_score !== 'undefined' && typeof data_results[id].second_score == 'undefined')
                    round_results.push([data_results[id].first_score,null]);
                if (typeof data_results[id].first_score !== 'undefined' && typeof data_results[id].second_score !== 'undefined')
                    round_results.push([data_results[id].first_score,data_results[id].second_score]);
            }else{
                round_results.push([null,null]);
            }

            id +=1;
        }
        
        console.log('autoCompleteData');
        console.log(autoCompleteData);
    
        /* autoCompleteData ={
            teams: [              // Matchups
                ["Team 1", "Team 2"], // First match
                ["Team 3", "Team 4"],
                ["Team 5", "Team 6"],
                ["Team 7", "Team 8"]
            ],
            results: [            // List of brackets (single elimination, so only one bracket)
                [                     // List of rounds in bracket
                [                   // First round in this bracket
                    [1, 2],           // Team 1 vs Team 2
                    [3, 4],            // Team 3 vs Team 4
                    [5, 4],
                    [1, 5]
                ],
                [                   // Second (final) round in single elimination bracket
                    [5, 6],           // Match for first place
                    [7, 8]            // Match for 3rd place
                ]
                ]
            ]

        ]
    } */

    function arrayRemove(arr, value) {    
        return arr.filter(function(ele){ 
            return ele != value; 
        });
    }
    function saveFn(data, userData) {
        var matches = new Array;
        var match_c =0;
        
        var teams= new Array;
        for (let index = 0; index < data.teams.length; index++) {
            teams.push(data.teams[index][0]);
            teams.push(data.teams[index][1]);
            
        }
        
        for (let index = 0; index < data.results[0].length; index++) {
            var cnt=0;
            for (let y = 0; y < data.results[0][index].length; y++) {
                matches[match_c]=new Array;
                // console.log('index'+index+' y '+y+'data '+data.results[0][index][y][0]);
                if(typeof data.results[0][index][y][0] !== 'undefined' && typeof data.results[0][index][y][1] !== 'undefined')
                {
                    if(typeof data.results[0][index][y][0] !== 'undefined')
                    {
                        matches[match_c].push(data.results[0][index][y][0]);
                    }
                    else
                    matches[match_c].push(null);
                    if(typeof data.results[0][index][y][1] !== 'undefined')
                    {
                        matches[match_c].push(data.results[0][index][y][1]);
                        
                    }
                    else
                    matches[match_c].push(null);
                    
                }
                if (typeof data.results[0][index][y][0] !== 'undefined' && typeof data.results[0][index][y][1]!== 'undefined') {
                    matches[match_c].push(teams[cnt]);
                    cnt++;
                    matches[match_c].push(teams[cnt]);
                    
                }
                
                if(index==0)
                {
                    if(data.results[0][index][y][0] > data.results[0][index][y][1])
                        teams= arrayRemove(teams,data.teams[y][1]);
                    
                    
                    if(data.results[0][index][y][0] < data.results[0][index][y][1])
                        teams= arrayRemove(teams,data.teams[y][0]);
                }
                if (index>0) {
                    if(data.results[0][index][y][0] < data.results[0][index][y][1])
                        teams= arrayRemove(teams,teams[y]);

                    if(data.results[0][index][y][0] > data.results[0][index][y][1])
                        teams= arrayRemove(teams,teams[y+1]);
                }
                match_c++;
            }

        }
        console.log(matches);
        var json = jQuery.toJSON(matches)
        //var json = JSON.stringify(matches);
        console.log('json:'+json)
        // console.log(data);
        $('#saveOutput').text('POST '+userData+' '+json)
        jQuery.ajax("/api/listing/"+{{$listing->id}}+"/game", {contentType: 'application/json',
                                        dataType: 'json',
                                        type: 'post',
                                        data: json})
        
    }
    $(function() {
        /* $('#matches .demo').bracket({
            init: autoCompleteData,
            skipConsolationRound: true,
            teamWidth: 150,
            scoreWidth: 50,
            matchMargin: 50,
            roundMargin: 50

            save: saveFn,
        }) */
        var container = $('#matches .demo')
        container.bracket({
            init: autoCompleteData,
            skipConsolationRound: true,
            disableTeamEdit:true,
            disableToolbar: true,
            teamWidth: 150,
            scoreWidth: 50,
            matchMargin: 50,
            roundMargin: 50,
            save: saveFn,
            // userData: "http://myapi"
        })
    
        /* You can also inquiry the current data */
        var data = container.bracket('data')
        $('#dataOutput').text(jQuery.toJSON(data))
        })
    
</script>
    <x-card  class="mt-4 p-2 flex space-x-6">
        {{-- <span id="matchCallback"></span> --}}
        <div  id="matches">
        <div class="demo">
        </div>
        </div>
    </x-card>
</x-layout>
        