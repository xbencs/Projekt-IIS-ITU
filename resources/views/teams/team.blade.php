<x-layout>
    
    {{-- @include('partials._search')
    @include('partials._hero') --}}
    
    <div style="padding-bottom: 1%" class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        <img class="w-48 mr-6 mb-6"
          {{--src="{{$team->logo ? asset('storage' . $team->logo) : asset('/image/no-image.png')}}" alt="" />--}}
          src="{{$team->logo ? asset('storage/' . $team->logo) : asset('/image/no-image.png')}}" alt="" />

    
            <h3 class="text-2xl mb-2">{{$team->name}}</h3>
                
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    {{$team->description}}
                </h3>
                <div class="text-lg space-y-6">
                    Created by:
                    <a href="/users/{{$team->owner_id}}''">{{$owner->name}}</a>
    
                </div>
                @auth
                @if($team->owner_id == auth()->user()->id)
                <a 
                        href="/teams/{{$team->id}}/manage"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i> 
                        Manage Team
                </a>

                <a 
                        href="/teams/{{$team->id}}/edit"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i> 
                        Edit Team Profile
                </a>
                @endif
                @endauth
            </div>
        </div>
    </x-card>
    </div>

    
    {{-- ///////////////////////////////////////////////////////// --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    
        @unless(count($users) == 0)
        @foreach($users as $user)
            
            <x-user-card :user="$user" />
    
        @endforeach
            
        @else
            <p>No user found</p>
        @endunless
    
    </div>
    
    
</x-layout>