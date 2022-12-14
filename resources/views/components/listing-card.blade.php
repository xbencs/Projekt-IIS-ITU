{{--Created by Jasmína Csalova--}}
@props(['listing'])

<!-- Item 1 --> <!--new component-->
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/image/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl font-bold">
                <a href="./listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <x-listing-tags :tagsCsv="$listing->sport"> </x-listing-tags>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
           
            <i class="far fa-calendar-alt"></i> {{$listing->date}}
            
            <div class="mb-10">
                 
                @if($listing->approved === 1)
                Approved by admin
                    <span>&#10003;</span>  
                @else
                Not-approved by admin
                    <i class="fa fa-close"></i>
                @endif
            </div>
        </div>
    </div>
</x-card>