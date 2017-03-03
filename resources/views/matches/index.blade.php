@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('emails-sent') }}
            </div>
        @endif
        <p>Upcoming Matches</p>
        @foreach ($matches as $match)

            @if ($match->date_time < $now)

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $match->opponent->name }}</h3>
                </div>
                <div class="panel-body">
                    <p>{{ $match->venue }} | {{ $match->date_time }}</p>
                    <strong>{{ $match->response }}</strong>

                    @if (!empty ($match->player))
                    Team:

                        <ul>
                            @foreach ($match->player as $player)

                                <li>{{ $player->first_name }}</li>

                            @endforeach
                        </ul>
                    @else
                        No Players Added Yet
                    @endif
=
                </div>

            </div>

            @endif

        @endforeach



            <p>Results</p>
            @foreach ($matches as $match)

                @if ($match->date_time > $now)

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $match->opponent->name }}</h3>
                        </div>
                        <div class="panel-body">
                            <p>{{ $match->venue }} | {{ $match->date_time }}</p>
                            @if (!empty($match->pairing))
                            Team:
                                <ul>
                                    @foreach ($match->pairing as $pairing)
                                        <li>Group Number: {{ $pairing->group }} | {{ $pairing->pivot->points  }} Points
                                            <ul>
                                                @foreach ($pairing->player as $player)
                                                    <li>{{ $player->first_name }} {{ $player->last_name }} | {{ $player->handicap }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                No Pairings Added Yet
                            @endif

                        </div>
                        <div class="panel-footer">
                        <a href="{{ $match->opponent->venue->website_url }}"><div>View Website</div></a>
                        </div>

                    </div>

                @endif

            @endforeach

        @admin
            <a href="/matches/create" class="btn btn-primary">
                Add New
            </a>
        @endadmin


    </div>



@stop