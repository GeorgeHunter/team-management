@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/matches/send/{{ $match->id }}">

            {{ csrf_field() }}

            <input type="text" hidden name="match_id" value="{{ $match->id }}">

            @foreach($players as $player)

                <div class="checkbox">
                    <label for="{{ $player->id }}">
                        <input type="checkbox" id="{{ $player->id }}" value="{{ $player->email }}" name="emails[]">
                        {{ $player->email }}
                    </label>
                </div>

            @endforeach

            <button type="submit">Send!</button>

        </form>



    </div>

@stop