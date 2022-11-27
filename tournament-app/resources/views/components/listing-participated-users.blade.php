
@props(['user', 'listing'])
<head>
    <link rel="stylesheet" href="/css/rounded_toggle_switch.css" />
    @livewireStyles
</head>
<!-- Item 1 --> <!--new component-->
<body>
<x-card>

    <div class="flex">
        <img class="w-24" src="{{asset('image/user.png')}}" alt="" class="logo"/>
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="/users/{{$user->id}}''">{{$user->name}}</a>
            </h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>
            
            @if($user->is_approved === 1)
                Approved by tournament creator
                <span>&#10003;</span>
            @else
                Not-approved by tournament creator
                <i class="fa fa-close"></i>
            @endif

            <!-- Rounded switch -->

        </div> 
                
    </div>
        @if(auth()->user()->id === $listing->user_id)
            <td>
                @livewire('toggle-button', [
                'user' => $user,
                'listing' => $listing,
                'field' => 'is_approved']
                , key($user->id))
            </td>
        @endif
</x-card>
@livewireScripts
</body>

