
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="image/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Sport | Find Tournaments & Join</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('image/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">

                <li>
                    <a href="/registered_users" class="hover:text-laravel"
                        ><i class="fa-solid fas fa-user-alt"></i>
                        Players</a
                    >
                </li>
                <li>
                    <a href="/registered_teams" class="hover:text-laravel"
                        ><i class="fa-solid fas fa-users"></i>
                        Teams</a
                    >
                </li>
                
                @auth
                <li>
                    <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fas fa-list"></i>
                        Manage My Tournaments</a
                    >
                </li>

                <li>
                <a href="/users/{{auth()->user()->id}}/edit" class="hover:text-laravel"
                        ><i class="fas fa-user-edit"></i>
                        Edit profile</a
                    >
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-sign-out"></i> Logout

                    </form>
                </li>        

                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth


               {{-- TODO: WHY IT IS NOT WORKING??????? DROPDOWN MENU
                <div id="dropdown">
                    <button class="fas fa-volleyball-ball"> More</button>
                    <div>
                        <ol>
                            <span><li href='*'>Players</li></span>
                            <span><li href='*'>Teams</li></span>
                            <span><li href='*'>Tournamnets</li></span>
                        </ol>
                    </div>
                </div>  --}}
                

            </ul>
        </nav> 
        <main>
        {{--VIEW OUTPUT--}}

        {{$slot}}
        </main>
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/listings/create"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Tournament</a
            >
        </footer>

        <x-flash-message />
    </body>
</html>
    </body>

</html>