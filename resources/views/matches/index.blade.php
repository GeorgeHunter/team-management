@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('emails-sent') }}
            </div>
        @endif
        <p>Matches this season</p>
        @foreach ($matches as $match)
            <a href="/matches/{{ $match->id }}"><h3>{{ $match->opponent->name }}</h3></a>
            <p>{{ $match->venue }} | {{ $match->date_time }}</p>
            <strong>{{ $match->response }}</strong>
            {{--<ul>--}}
                {{--@foreach ($match->pairing as $pairing)--}}
                    {{--<li>{{ $pairing->group }}--}}
                        {{--<ul>--}}
                            {{--@foreach ($pairing->player as $player)--}}
                                {{--<li>{{ $player->first_name }} {{ $player->last_name }} | {{ $player->handicap }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        @endforeach

        @admin
            <a href="/matches/create" class="btn btn-primary">
                Add New
            </a>
        @endadmin


    </div>



@stop