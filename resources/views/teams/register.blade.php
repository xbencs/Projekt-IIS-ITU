{{--Created by Sebastián Bencsík--}}
<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create a team to participate in a tournament</p>
        </header>

        <form method="POST" action="/teams" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{old('name')}}"
                    required
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
                    rows="3"
                    placeholder="Include who are you looking for etc"
                    value="{{old('description')}}"
                    required
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
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Submit
                </button>
            </div>

        </form>
    </x-card>
</x-layout>