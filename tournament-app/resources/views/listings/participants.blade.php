<x-layout>

    @include('partials._hero')
    @if($listing->collective)
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($teams) == 0)
            @foreach($teams as $team)
                <x-listing-participated-teams :team="$team" 
                                              :listing="$listing" />
            @endforeach
        @else 
            <p>No players found</p>
        @endunless
    </div>
    @else
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($users) == 0)           
            @foreach($users as $user)
                <x-listing-participated-users :user="$user" 
                                              :listing="$listing" />
            @endforeach
        @else 
            <p>No players found</p>
        @endunless
    </div>
    @endif

</x-layout>
