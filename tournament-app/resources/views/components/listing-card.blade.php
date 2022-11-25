
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
            <h3 class="text-2xl">
                <a href="./listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->sport">
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
            </x-listing-tags>
            <div class="mb-10">
                 Approved by admin
                {{--@if($listing->approved === 1)
                    <span>&#10003;</span>  
                @else
                    <i class="fa fa-close"></i>
                @endif--}}
            </div>
        </div>
    </div>
</x-card>