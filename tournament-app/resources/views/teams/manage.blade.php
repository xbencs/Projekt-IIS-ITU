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
                                <div class="relative z-0">
                                    <input name="name" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-black-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
                                    <label for="floating_standard" class="absolute text-sm text-black-500 dark:text-black-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
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