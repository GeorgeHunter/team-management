@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('emails-sent'))
            <div class="alert alert-success">
                {{ session('emails-sent') }}
            </div>
        @endif

        @admin
            <a href="/matches/create" class="btn btn-primary mb-4">
                Add New
            </a>
        @endadmin

        <h3 class="mb-4">Upcoming Matches</h3>
            
        @foreach ($matches as $match)

            @if ($match->date_time > $now)

                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 style="margin-bottom: 0; font-weight: normal;" class="panel-title">{{ $match->opponent->name }}</h6>
                        </div>
                        <div class="card-block">
                            <p><span style="text-transform: capitalize;">{{ $match->venue }}</span> | {{ $match->date_time }}</p>
                            <strong>{{ $match->response }}</strong>

                            <p>Team:</p>
                            @if (count ($match->player))

                                <ul>
                                    @foreach ($match->player as $player)

                                        <li>{{ $player->first_name }}</li>

                                    @endforeach
                                </ul>
                            @else
                                No Players Added Yet
                            @endif
                        </div>
                    </div>

            @endif

        @endforeach


            <h3 class="mb-4">Results</h3>

            @foreach ($matches as $match)

                @if ($match->date_time < $now)

                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h6 class="mb-0">{{ $match->opponent->name }}</h6>
                        </div>
                        <div class="card-block">
                            <p>{{ $match->venue }} | {{ $match->date_time }}</p>
                            @if (count($match->pairing))
                                <p>Team:</p>
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
                    </div>

                @endif

            @endforeach

    </div>

@stop