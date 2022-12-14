
@props(['user', 'listing'])
<head>
    {{-- <link rel="stylesheet" href="/css/rounded_toggle_switch.css" /> --}}
    <style>
        /* CHECKBOX TOGGLE SWITCH */
        /* @apply rules for documentation, these do not work as inline style */
        .toggle-checkbox:checked {
          @apply: right-0 border-green-400;
          right: 0;
          border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
          @apply: bg-green-400;
          background-color: #68D391;
        }
        </style>
    @livewireStyles
</head>
<!-- Item 1 --> <!--new component-->
<body>
<x-card>

    <div class="flex">
    <img class="w-24" src="{{asset($user->avatar)}}" alt="" class="logo"style="border-radius:50%" />
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="/users/{{$user->id}}''">{{$user->name}}</a>
            </h3>

            <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$user->email}}</div>
            
            @if(auth()->user()->id != $listing->user_id)
                @if($user->participate_listings()->where('listing_id', $listing->id)->first()->pivot->is_approved === 1)
                    Approved by tournament creator
                    <span>&#10003;</span>
                @else
                    Not-approved by tournament creator
                    <i class="fa fa-close"></i>
                @endif
            @else
            Change approvement

            <!-- Rounded switch -->
            @if(auth()->user()->id === $listing->user_id)
            <td>
                @livewire('toggle-button', [
                'user' => $user,
                'listing' => $listing,
                'field' => 'is_approved'],
                key($user->id))
            </td>
            @endif
        @endif
        
        </div> 
                
    </div>
        
</x-card>
@livewireScripts
</body>

