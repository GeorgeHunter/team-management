@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('emails-sent'))
            <alert status="success">
                {{ session('emails-sent') }}
            </alert>
        @endif

        @admin
            <a href="/matches/create" class="btn btn-info mb-4">
                Add New
            </a>
        @endadmin

        <h3 class="mb-4">Upcoming Matches</h3>
            <div class="row">

            @foreach ($matches as $match)


                @if ($match->date_time > $now)

                    <div class="col-lg-6 col-xl-4">

                        <div class="card mb-4">
                            <div class="card-header bg-info">
                                <h6 style="margin-bottom: 0; font-weight: normal;" class="panel-title"><a class="text-white" href="/matches/{{ $match->id }}">{{ $match->opponent->name }}</a></h6>
                            </div>
                            <div class="card-block">
                                <p><span style="text-transform: capitalize;">{{ $match->venue }}</span> | {{ $match->date_time->format('D M-d Y') }}</p>
                                <strong>{{ $match->response }}</strong>

                                @admin
                                <a href="/matches/send/{{$match->id}}" class="btn btn-outline-primary mb-2">Send emails</a>
                                @endadmin

                                {{--<p>Team:</p>--}}
                                {{--@if (count ($match->player))--}}
                                        {{--<ul>--}}
                                            {{--@foreach ($match->player as $player)--}}
                                                {{--@if ($player->pivot->available)--}}
                                                    {{--<li>{{ $player->first_name }}</li>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                {{--@else--}}
                                    {{--No Players Added Yet--}}
                                {{--@endif--}}
                            </div>
                        </div>
                    </div>
                @endif



        @endforeach
            </div>

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