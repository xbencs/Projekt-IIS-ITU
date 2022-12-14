{{--Created by Jasmína Csalova--}}
<x-layout>
    <x-card
        class="rounded max-w-lg mx-auto mt-24 mb-4">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Joined
            </h2>
        <p class="mb-4">Tournament: {{$listing->title}}</p>
        </header>
        <header class="text-center font-bold"> <h1> To the best of my ability I {{auth()->user()->name}} will:</h1> </header>
        <h3> Play by the rules;</h3> 
        <h3> Never argue with a coach or official;</h3> 
        <h3> Work hard to do my best at all times;</h3> 
        <h3>Turn up on time;</h3> 
        <h3>Be a good sport and recognise good players and good plays by all involved; </h3>
        <h3>Remember to thank my coach, the officials, the opposition and the supporters; </h3>
        <h3>Help others in my team when I can;</h3> 
        <h3>Avoid putting people down and bullying them;</h3> 
        <h3>Give it heaps but not get ugly.</h3> 
    </x-card>

    <div class="mb-6 text-center">

        <label for="participants"></label>
        Submitted

    </div>
        

    <div class="mb-6 text-center">

    <a href="/listings/{{$listing->id}}" class="text-black ml-4"> Back </a>
    </div>

</x-layout>