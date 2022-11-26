<x-layout>
    <x-card class p-10>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage team
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($users->isEmpty())
                @foreach($users as $user)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                        <a href="show.html">
                            @if($user->id == $team->owner_id)
                            <i class="fa-solid fa-crown"></i>
                            @endif
                            {{$user->name}}
                        </a>
                    </td>
                    
                    @if($user->id != $team->owner_id)
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    
                        <form method="POST" action="/teams/{{$team->id}}/{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> 
                                Delete 
                            </button>
                        </form>
                    </td>
                    @endif

                </tr>
                @endforeach
                @else 
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 trxt-lg">
                        <p class="text-center">No Members Found</p>
                    </td>
                </tr>
                @endunless
                <tr class="border-gray-300">
                        <form method="POST" action="/teams/{{$team->id}}/add">
                            @csrf
                            @method('PUT')   
                            <td class="px-4 py-8 border-t border-b border-gray-300 trxt-lg">
                                <div style="overflow: hidden; padding-right: .5em;">
                                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" placeholder="Username" style="width: 100%;" />
                                </div>                        
                                
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 trxt-lg">
                                <button  class="text-green-500"><i class="fa-sharp fa-solid fa-user-plus"></i> 
                                    ADD
                                </button>
                                
                            </td>
                            
                        </form>
                    

                </tr>
            </tbody>
        </table>
    </x-card>

</x-layout>