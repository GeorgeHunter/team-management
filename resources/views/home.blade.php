@extends('layouts.app')

@section('content')

    <div style="max-height: 350px; overflow: hidden; margin-top: -24px;" class="mb-5">

        <img src="/images/home-banner.jpg" class="banner__img" style="position: relative; top: -120px">
    </div>

<div class="container">
    <h1 class="h3 mb-4">Next Match</h1>
    <div class="row">

        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header">{{ $next_match->opponent->name }}</div>
                <div class="card-block">
                    <ul class="mb-1">
                        <li>{{ $next_match->date_time->format('D d-M') }}</li>
                        <li>{{ $next_match->date_time->format('H:i') }}</li>
                        <li class="text-capitalize">{{ $next_match->venue }}</li>
                        <li><a href="matches/{{$next_match->id}}">Click to see more</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header bg-info text-white"><span>Contact</span></div>
                <div class="card-block">
                    <p>Don't hesitate to get in touch if you any questions or issues:</p>
                    <i class="fa fa-user fa-fw mr-2"></i> <span class="font-weight-bold">George Hunter</span> <br>
                    <i class="fa fa-phone fa-fw mr-2"></i> <a href="tel:07511928724">07511928724 <br></a>
                    <i class="fa fa-envelope fa-fw mr-2"></i> <a href="mailto:golf@wheathill.club">golf@wheathill.club</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-12 mb-5">
            <h1 class="h3 mb-4">Upcoming Matches</h1>
            <div class="card-deck">

                @foreach ($future_matches as $match)
                    @if($loop->iteration != 1 && $loop->iteration < 5)
                        <div class="card">
                            <div class="card-header">{{ $match->opponent->name }}</div>
                            <div class="card-block">
                                <ul class="mb-1">
                                    <li>{{ $match->date_time->format('D d-M') }}</li>
                                    <li>{{ $match->date_time->format('H:i') }}</li>
                                    <li class="text-capitalize">{{ $match->venue }}</li>
                                    <li><a href="matches/{{$match->id}}">Click to see more</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-12">
            <h1 class="h3 mb-4">Recent Results</h1>

            @if(count($results) > 0)

                @foreach ($results as $match)
                    <div class="card">
                        <div class="card-header">{{ $match->opponent->name }}</div>
                        <div class="card-block">
                            <ul class="mb-1">
                                <li>{{ $match->date_time->format('D d-M') }}</li>
                                <li>{{ $match->date_time->format('H:i') }}</li>
                                <li class="text-capitalize">{{ $match->venue }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            @else

                <p>No Results Posted Yet</p>

            @endif

        </div>

    </div>
</div>
@endsection
