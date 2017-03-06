@extends('layouts.app')

@section('content')

    <div class="container">

        @php($match_check = [])

        @foreach($match->player as $player)
            @if ( $player->pivot->emailed )
{{--                {{ $player->first_name }}--}}
                @php( array_push($match_check, $player->id))
            @endif
        @endforeach

        {{--@php(dd($match_check))--}}

        <h3 class="mb-4">Select people to email</h3>

        <form method="POST" action="/matches/send/{{ $match->id }}" class="mb-4">

            {{ csrf_field() }}

            <input type="text" hidden name="match_id" value="{{ $match->id }}">

            {{--@php(dd($match->player))--}}

            @foreach($players as $player)
                @if (! in_array($player->id, $match_check))
                <div class="checkbox">
                    <label for="{{ $player->id }}">
                        <input type="checkbox" id="{{ $player->id }}" value="{{ $player->id }}" name="players[]">
                        {{ $player->email }}
                    </label>
                </div>
                @endif
            @endforeach

            <button type="submit" class="btn btn-primary mt-2">Send!</button>

        </form>

        <h3>Already Emailed</h3>


        @foreach($match->player as $player)
            @if ( $player->pivot->emailed )
                {{ $player->first_name }}
            @endif
        @endforeach


    </div>

@stop


