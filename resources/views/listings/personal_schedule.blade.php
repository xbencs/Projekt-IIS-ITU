{{--Created by Jasmína Csalova--}}

<x-layout>
    <x-card class p-10>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                My schedule
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless(count($listings) == 0)
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="font-bold px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->title}}
                        </a>

                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    > <i class="fas fa-volleyball-ball"></i>
                        <a  class="px-6 py-2 rounded-xl">
                            {{$listing->sport}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <i class="fas fa-calendar"></i>
                            @if ($listing->date != NULL)
                                <a  class="px-6 py-2 rounded-xl">
                                    {{$listing->date}}
                                </a>
                            @else 
                                <a class="px-6 py-2 rounded-xl">
                                    Date not announced
                                </a>
                            @endif
                    </td>

                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <i class="fa-solid fa-location-dot"></i>
                        <a  class="px-6 py-2 rounded-xl">
                            {{$listing->location}}
                        </a>
                    </td>

                </tr>
                @endforeach
                @else 
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 trxt-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>

</x-layout>