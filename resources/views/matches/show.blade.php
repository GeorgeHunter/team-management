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

        <h1 class="h2 mb-4">{{ $match->opponent->name }}</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <h3 class="h5">Details</h3>
                <ul class="mb-3">
                    <li class="text-capitalize">Venue: <span class="font-weight-bold">{{ $match->venue }}</span></li>
                    <li>Date: <span class="font-weight-bold">{{ $match->date_time->format('D d M Y') }}</span></li>
                    <li>Start: <span class="font-weight-bold">{{ $match->date_time->format('H:i') }}</span></li>
                </ul>
                <a class="btn btn-info" href="{{ $match->opponent->website_url }}">View Website</a>
            </div>





        </div>

        <div class="row">

            <div class="col-md-6">
                <h3 class="h5">Team</h3>
                <ul>
                    @foreach ($match->player as $player)
                        <li>{{ $player->first_name }} {{ $player->last_name }}
                            @if($player->pivot->paid == 1)
                                <i class="fa fa-check-circle-o text-success"></i>
                            @endif
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="col-md-6">
                <h3 class="h5">Pairings</h3>
                @if (count($match->pairing) > 0)
                    @foreach( $match->pairing as $pairing)
                        @foreach ($pairing->player as $player)
                            {{ $player->first_name }} {{ $player->last_name }} @if($loop->first)|@endif
                        @endforeach
                        <div><strong>Points: {{ $pairing->pivot->points }}</strong></div>
                    @endforeach
                @else
                    Pairings will be shown here when decided
                @endif

                @admin
                <a href="/matches/edit/{{ $match->id }}">Edit Team</a>
                @endadmin

            </div>


        </div>








        <div class="col-xs-12 mb-5" style="margin-top: 32px;">
            <a href="/matches" class="btn btn-primary btn-large">Back to All</a>
        </div>

    </div>

@stop