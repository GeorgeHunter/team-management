@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Pairings this season</p>
        @foreach ($pairings as $pairing)
            @php($sum = 0)
            @foreach( $pairing->matches as $match)
                @php($sum += $match->pivot->points)
            @endforeach
            <ul>
                @foreach ($pairing->player as $player)
                    <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                @endforeach
                <strong>Points Scored: {{ $sum }}</strong>
            </ul>
        @endforeach
    </div>



@stop