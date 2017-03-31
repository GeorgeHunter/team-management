@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('added_player'))
            <div class="alert alert-success">
                {{ session('added_player') }}
            </div>
        @endif

        @admin
            <a class="btn btn-info mb-4" href="/players/create">Add Player</a>
        @endadmin

            <div class="row row--players">
                @foreach($players as $player)
                    {{--{{ $player }}--}}
                    <div class="col-lg-6 col-xl-4">

                        <div class="card mb-4">
                            <div class="card-header @if (Auth::User() && Auth::User()->player->id == $player->id) bg-info text-white  @endif">
                                {{ $player->first_name }} {{ $player->last_name }}
                            </div>
                            <div class="card-block">
                                Handicap: {{ $player->handicap }} <br>
                                @admin Email: {{ $player->email }} @endadmin
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $players->links() }}
            </div>
    </div>

@stop