@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <hr>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control typeahead" id="first_name" placeholder="First Name">
                    </div>

                    <h3>Upcoming Matches</h3>

                    @foreach( $user_pairings as $pairing)
                        @foreach ($pairing->matches as $match)
                            @if ($now < $match->date_time)
                            <p>{{ $match->opponent->name }} | {{ $match->venue }} | {{ $match->date_time->format('d M Y') }}</p>
                            @endif
                        @endforeach

                        <h3>Matches You've Played In</h3>

                        @foreach ($pairing->matches as $match)
                            @if ($now > $match->date_time)
                                <p>{{ $match->opponent->name }} | {{ $match->venue }} | {{ $match->date_time->format('d M Y') }}</p>
                            @endif
                        @endforeach
                    @endforeach

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
