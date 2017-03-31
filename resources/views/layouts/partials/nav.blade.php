{{-- I get the message count up here because it seems a bit tidier, though one day this should be abstracted --}}
@if (Auth::user() && !empty(auth()->user()->player->messages))
    @php($unread_message_count = 0)

    @foreach (auth()->user()->player->messages as $message)
        @if (!$message->read)
            @php($unread_message_count++)
        @endif
    @endforeach
@endif

<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary mb-4">
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
                <li class="nav-item {{ (Request::is('players') ? 'active' : '') }}">
                    <a class="nav-link" href="/players">Players</a>
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
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-on:click="toggleNav">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <transition name="fade">
                                <div class="p-0" aria-labelledby="navbarDropdownMenuLink" v-if="showNav" style="position: absolute; z-index: 100; width: 200px;">
                                    <a class="dropdown-item list-group-item" href="/dashboard">
                                        <i class="fa fa-th fa-fw mr-2"></i> Dashboard
                                    </a>
                                    @admin
                                    <a class="dropdown-item list-group-item justify-content-between" href="/messages">
                                        Messages
                                        <span class="badge badge-info badge-pill">@if(isset($unread_message_count)){{ $unread_message_count }}@endif</span>
                                    </a>
                                    @endadmin
                                    {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();"--}}
                                    <a href="{{ route('logout') }}" class="dropdown-item list-group-item justify-content-between"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                                </transition>
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