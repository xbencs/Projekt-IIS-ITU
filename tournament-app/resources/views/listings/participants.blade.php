<x-layout>

    @include('partials._hero')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach($users as $user)
            <x-listing-participated-users :user="$user" />
        @endforeach
    </div>


</x-layout>
