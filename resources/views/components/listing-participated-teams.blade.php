{{--Created by Jasmína Csalova--}}
@props(['team', 'listing'])
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
        <img class="w-48 mr-6 mb-6"
          src="{{$team->logo ? asset('storage/' . $team->logo) : asset('/image/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                {{--<div class="text-xl font-bold mb-4">{{$user->name}}</div>--}}
                <a href="/teams/{{$team->id}}''">{{$team->name}}</a>
            </h3>

            {{-- <div class="text-lg mt-4"> <i class="fa fa-envelope"></i> {{$tea->email}}</div> --}}
            
            @if(auth()->user()->id != $listing->user_id)
                @if($team->participate_listings()->where('listing_id', $listing->id)->first()->pivot->is_approved === 1)
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
                'team' => $team,
                'listing' => $listing,
                'field' => 'is_approved'],
                key($team->id))
            </td>
            @endif
        @endif
        
        </div> 
                
    </div>
        
</x-card>
@livewireScripts
</body>

