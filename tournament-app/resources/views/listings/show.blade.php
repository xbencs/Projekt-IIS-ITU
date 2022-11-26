
<x-layout>
@include('partials._search')
    
<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<x-card class="p-10">
    <div
        class="flex flex-col items-center justify-center text-center"
    >
        <img
            class="w-48 mr-6 mb-6"        
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/image/no-image.png')}}"
            alt=""
        />

        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
        
    <x-listing-tags :tagsCsv='$listing->sport' />

        <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Tournament Description
            </h3>
            <div class="text-lg space-y-6">
               {{$listing->descriptions}}

                <a
                    href="mailto:{{$listing->email}}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Organizer</a
                >

                <a
                    href="{{$listing->website}}"
                    target="_blank"
                    class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >

                {{--<div class="mb-10">
                    Approved by admin
                   @if($listing->approved === 1)
                       <span>&#10003;</span>  
                   @else
                       <i class="fa fa-close"></i>
                   @endif
               </div>--}}

               <a 
                    href="/listings/{{$listing->id}}/edit"
                    class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80">
                    <i class="fa-solid fas fa-pen"></i> 
                    Edit approval
                </a>

            </div>
        </div>
    </div>
</x-card>
    
<x-card class="mt-4 p-2 flex space-x-6">

    <form method="POST" action="/listings/{{$listing->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
</x-card>
<x-card  class="mt-4 p-2 flex space-x-6">
    {{-- <span id="matchCallback"></span> --}}
    <div  id="matches">
      <div class="demo">
      </div>
    </div>
</x-card>
</div>
</x-layout>
    