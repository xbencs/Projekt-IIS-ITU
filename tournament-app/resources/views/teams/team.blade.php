<x-layout>
    
    @include('partials._search')
    @include('partials._hero')
    
    <div style="padding-bottom: 1%" class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
    
            <h3 class="text-2xl mb-2">{{$team->name}}</h3>
                
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    {{$team->description}}
                </h3>
                <div class="text-lg space-y-6">
                    Created by:
                    <a href="/users/{{$owner->id}}''">{{$owner->name}}</a>
    

                </div>
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