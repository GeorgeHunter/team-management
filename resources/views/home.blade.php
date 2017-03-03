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



                    <h3>Your Matches</h3>
                    @if (isset($user_pairings))
                        <h4>Upcoming Matches</h4>
                        @foreach( $user_pairings as $pairing)
                            @foreach ($pairing->matches as $match)
                                @if ($now < $match->date_time)
                                <p>{{ $match->opponent->name }} | {{ $match->venue }} | {{ $match->date_time->format('d M Y') }}</p>
                                @endif
                            @endforeach

                            <h4>Matches You've Played In</h4>

                            @foreach ($pairing->matches as $match)
                                @if ($now > $match->date_time)
                                    <p>{{ $match->opponent->name }} | {{ $match->venue }} | {{ $match->date_time->format('d M Y') }}</p>
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        <p>You haven't played in, or signed up for, any matches yet</p>
                    @endif

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
