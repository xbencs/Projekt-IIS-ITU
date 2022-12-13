{{--Created by Sebastián Bencsík--}}
@props(['team'])

<!-- Item 1 --> <!--new component-->
<x-card>
    <div class="flex">
        <img class="w-48 mr-6 mb-6"
        src="{{$team->logo ? asset('storage/' . $team->logo) : asset('/image/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="./teams/{{$team->id}}''">{{$team->name}}</a>
                
            </h3>

            <div class="text-lg mt-4"> <i class="fa-solid fa-quote-right"></i> {{$team->description}}</div>
            
        </div>
    </div>
</x-card>