
@props(['user'])
<head>
    <link rel="stylesheet" href="/css/rounded_toggle_switch.css" />
</head>
<!-- Item 1 --> <!--new component-->
<x-card>

    <div class="flex">
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="/users/{{$user->id}}''">{{$user->name}}</a>
            </h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>

            <div class="mb-10">

                @if($user->is_approved === 1)
                    Approved by tournament creator
                    <span>&#10003;</span>
                @else
                    Not-approved by tournament creator
                    <i class="fa fa-close"></i>
                @endif
            </div>
            {{--<div style = "position:relative; left:400px; bottom:80px;">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>--}}
            <!-- Rounded switch -->



        </div>
    </div>
</x-card>
