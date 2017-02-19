@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Pairings this season</p>
        @foreach ($pairings as $pairing)
            <ul>
                @foreach ($pairing->player as $player)
                    <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>



@stop