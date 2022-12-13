{{--Created by Sebastián Bencsík--}}
<x-layout>
    <x-card
        class="rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Team
            </h2>
        <p class="mb-4">Edit: {{$team->name}}</p>
        </header>
    
    <form method="POST" action="/teams/{{$team->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                    >*Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{$team->name}}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    *Team Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    value="{{$team->description}}"
                ></textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                  Team Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
        
                <img class="w-48 mr-6 mb-6"
                  src="{{$team->logo ? asset('storage/' . $team->logo) : asset('/image/no-image.png')}}" alt="" />
        
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update team
                </button>
    
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
    </x-layout>