@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('thanks_text'))
            <div class="alert alert-success">
                {{ session('thanks_text') }}
            </div>
        @endif
        @if (session('unthanks_text'))
            <div class="alert alert-danger">
                {{ session('unthanks_text') }}
            </div>
        @endif

        <h1 style="margin-bottom: 32px;">{{ $match->opponent->name }}</h1>

        <div class="col-md-6">
            <h3>Details</h3>
            <ul>
                <li>{{ $match->venue }}</li>
                <li>{{ $match->date_time->format('d-M-Y') }}</li>
                <li>{{ $match->date_time->format('H:i') }}</li>
            </ul>
            <a href="{{ $match->opponent->website_url }}">View Website</a>
        </div>

        <div class="col-md-6">
            <h3>Team</h3>
                @foreach( $match->pairing as $pairing)
                    @foreach ($pairing->player as $player)
                        {{ $player->first_name }} {{ $player->last_name }} @if($loop->first)|@endif
                    @endforeach
                    <div><strong>Points: {{ $pairing->pivot->points }}</strong></div>
                @endforeach

            <a href="/matches/edit/{{ $match->id }}">Edit Team</a>
            
            <hr>
        </div>

        <div>
            <p>Also the team?</p>
            <ul>
                @foreach ($match->player as $player)
                    <li>{{ $player->first_name }} {{ $player->last_name }} @if($player->pivot->paid == 1) | Paid! @endif</li>
                @endforeach
            </ul>

        </div>


        <div class="col-xs-12" style="margin-top: 32px;">
            <a href="/matches" class="btn btn-primary btn-large">Back to All</a>
        </div>

    </div>

@stop