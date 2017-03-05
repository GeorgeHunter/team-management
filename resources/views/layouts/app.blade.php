<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">

        {{-- I get the message count up here because it seems a bit tidier, though one day this should be abstracted --}}
        @if (Auth::user() && !empty(auth()->user()->player->messages))
            @php($unread_message_count = 0)

            @foreach (auth()->user()->player->messages as $message)
                @if (!$message->read)
                    @php($unread_message_count++)
                @endif
            @endforeach
        @endif

        <nav class="navbar navbar-toggleable-md navbar-inverse bg-danger mb-4">
            <div class="container">

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-5" href="/">{{ config('app.name') }}</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-0">
                        <li class="nav-item {{ (Request::is('matches') ? 'active' : '') }}">
                            <a class="nav-link" href="/matches">Matches</a>
                        </li>
                        <li class="nav-item {{ (Request::is('opponents') ? 'active' : '') }}">
                            <a class="nav-link" href="/opponents">Opponents</a>
                        </li>
                        {{--@if (Auth::user())--}}
                            {{--<li class="nav-item {{ (Request::is('pairings') ? 'active' : '') }}">--}}
                                {{--<a class="nav-link" href="/pairings">Pairings</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                        {{--@admin--}}
                        {{--<li class="nav-item {{ (Request::is('messages') ? 'active' : '') }}">--}}
                            {{--<a class="nav-link" href="/messages">Messages</a>--}}
                        {{--</li>--}}
                        {{--@endadmin--}}

                    </ul>

                    <ul class="navbar-nav mr-0 ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else


                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item list-group-item" href="/dashboard">
                                                <i class="fa fa-th fa-fw mr-2"></i> Dashboard
                                            </a>
                                            <a class="dropdown-item list-group-item justify-content-between" href="/messages">
                                                Messages
                                                <span class="badge badge-info badge-pill">@if(isset($unread_message_count)){{ $unread_message_count }}@endif</span>
                                            </a>
                                            {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();"--}}
                                            <a class="dropdown-item list-group-item" href="{{ route('logout') }}">
                                                <i class="fa fa-sign-out fa-fw mr-2"></i> Logout
                                            </a>

                                        </div>
                                    </li>
                                </ul>
                            </div>



                            <li class="dropdown" style="display: none;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/dashboard">
                                            Dashboard
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>



                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <!-- Scripts -->


    <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.min.js"></script>

    <script>
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substringRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            matches.push(str);
                        }
                    });

                    cb(matches);
                };
            };

            var opponents = ['Wincanton', 'Sturminster Marshall', 'Folke', 'Cannington', 'XX'
            ];

            $('.typeahead#opponent').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'opponents',
                    source: substringMatcher(opponents)
            });


    </script>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
