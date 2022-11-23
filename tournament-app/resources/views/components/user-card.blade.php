
@props(['user'])

<!-- Item 1 --> <!--new component-->
<x-card>
    <div class="flex">
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
        <div>
            {{--<div class="text-xl font-bold mb-4">{{$user()->name}}</div>--}}

            <h3 class="text-2xl" font-bold mb-4">{{$user->name}}</h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>
            
            

            {{-- <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags">
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
            </x-listing-tags> --}}
        </div>
    </div>
</x-card>