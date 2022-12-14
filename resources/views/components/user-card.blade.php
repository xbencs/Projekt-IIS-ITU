{{--Created by Jasmína Csalova--}}
{{--One part created by Filip Lorenc--}}
@props(['user'])

<!-- Item 1 --> <!--new component-->
<x-card>
    <div class="flex">
    <!-- Author Filip Lorenc-->
    <img class="w-24" src="{{asset($user->avatar)}}" alt="" class="logo"style="border-radius:50%" />
    <!--end-->
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="/users/{{$user->id}}''">{{$user->name}}</a>
            </h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>
            
        
        </div>
    </div>
</x-card>