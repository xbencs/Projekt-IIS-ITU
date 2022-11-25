<x-layout>
    
    @include('partials._search')
    @include('partials._hero')
    
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
        @unless(count($teams) == 0)
        @foreach($teams as $team)

            <x-team-card :team="$team" />
    
        @endforeach
            
        @else
            <p>No team found</p>
        @endunless
    
    </div>
    
    
</x-layout>