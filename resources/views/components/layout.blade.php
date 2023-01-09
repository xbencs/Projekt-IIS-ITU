{{--Created by Jasmína Csalova and Sebastián Bencsík--}}
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
        {{-- Bracket --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bracket/0.11.1/jquery.bracket.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bracket/0.11.1/jquery.bracket.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/cupertino/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/cupertino/theme.min.css" />
        {{-- ------ --}}
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
        <script>
            
            var autoCompleteData = {
                teams : [
                // ["fi:Team 1", "Team 2"],
                // ["Team 3", "Team 4"],
                // ["Team 5", "Team 6"],
                // ["Team 7", "Team 8"],
                // ["Team 9", "Team 10"],
                // ["Team 11", "Team 12"],
                // ["Team 13", "Team 14"],
                // ["Team 15", "Team 16"]
                ],
                results : []
            }
            
            /* function onclick(data) {
                $('#matchCallback').text("onclick(data: '" + data + "')")
            }
            
            function onhover(data, hover) {
                $('#matchCallback').text("onhover(data: '" + data + "', hover: " + hover + ")")
            } */
            function acEditFn(container, data, doneCb) {
                var input = $('<input type="text">')
                input.val(data)
                input.autocomplete({ source: acData })
                input.blur(function() { doneCb(input.val()) })
                input.keyup(function(e) { if ((e.keyCode||e.which)===13) input.blur() })
                container.html(input)
                input.focus()
            }
            
            function acRenderFn(container, data, score, state) {
                switch(state) {
                    case 'empty-bye':
                    container.append('BYE')
                    return;
                    case 'empty-tbd':
                    container.append('TBD')
                    return;
                
                    case 'entry-no-score':
                    case 'entry-default-win':
                    case 'entry-complete':
                    var fields = data.split(':')
                    if (fields.length >= 3)
                        container.append('<i>INVALID</i>')
                    else
                    container.append(''+fields[0]).append(fields[1])
                    return;
                }
            }
            

            
            
            // $(function() {
            //     $('#matches .demo').bracket({
            //         init: autoCompleteData,
            //         save: function(){}, /* without save() labels are disabled */
            //         decorator: {edit: acEditFn,
            //                     render: acRenderFn}})
            // })
            
            
            
        </script>
        <style>
            
            
            .dropdown {
              position: relative;
              display: inline-block;
            }
            
            .dropdown-content {
              display: none;
              position: absolute;
              right: 0;
              background-color: #f9f9f9;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }
            
            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }
            
            .dropdown-content a:hover {background-color: #f1f1f1;}
            
            .dropdown:hover .dropdown-content {
              display: block;
            }
            
            .dropdown:hover .dropbtn {
              color: #ef3b2d;
            }
            </style>
        <title>Sport | Find Tournaments & Join</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('image/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                </li>
                @endauth
                <li>
                    <a href="/registered_users" class="hover:text-laravel"
                        ><p class="text-dark"><i class="fa-solid fas fa-user-alt"></i>
                        Players</p></a
                    >
                </li>
                {{-- <li>
                    <a href="/registered_teams" class="hover:text-laravel"
                        ><i class="fa-solid fas fa-users"></i>
                        Teams</a
                    >
                </li> --}}
                
                <div class="dropdown" class="hover:text-laravel" style="float:right;">
                    <button class="dropbtn" class="hover:text-laravel"><a class="hover:text-laravel"
                        ><i class="fa-solid fas fa-users"></i>
                        Teams</a></button>
                    <div class="dropdown-content">
                    <a href="/registered_teams" class="hover:text-laravel">Browse</a>
                    @auth
                    @if(auth()->user()->current_team_id != NULL)
                    <a href="/teams/{{auth()->user()->current_team_id}}" class="hover:text-laravel">My team</a>
                    @endif
                    @endauth
                    </div>
                  </div>
                  
                @auth
                
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><p class="text-dark"><i class="fas fa-list"></i>
                        Manage My Tournaments</p></a
                    >
                </li>

                <li>
                    <a href="/schedule" class="hover:text-laravel"
                        ><p class="text-dark"><i class="fas fa-calendar"></i>
                        My Schedule</p></a
                    >
                </li>

                <li>
                <a href="/users/{{auth()->user()->id}}/edit" class="hover:text-laravel"
                        ><p class="text-dark"><i class="fas fa-user-edit"></i>
                        Edit profile</p></a
                    >
                </li>

                <div class="dropdown" class="hover:text-laravel" style="float:right;">
                    <a href="/welcome"><p class="text-dark"><i class="fas fa-bell"></i>
                        Announcements</p>
                    </a
                >
                </div>
    
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
                

            </ul>
        </nav> 
        <main>
        {{--VIEW OUTPUT--}}

        {{$slot}}
        </main>
        <footer style="z-index: 2"
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