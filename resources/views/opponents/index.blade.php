@extends('layouts.app')

@section('content')

    <div class="container">

        @admin
            <div class="mb-4">
                <a href="/opponents/create" class="btn btn-info">Add Opponent</a>
                <a href="/venues/create" class="btn btn-info">Add Venue</a>
            </div>
        @endadmin

        <div class="row">
            @foreach($opponents as $opponent)
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            <h6 class="panel-title mb-0">{{ $opponent->name }}</h6>
                        </div>
                        <div class="card-block">
                            @if (!empty ($opponent->venue))
                                {{ $opponent->venue->name }} <br>
                                Lat: <strong>{{ $opponent->venue->lat }}</strong> <br>
                                Long: <strong>{{ $opponent->venue->long }}</strong> <br>
                        </div>

                        <div class="card-footer">
                            <a href="{{ $opponent->venue->website_url }}" target="_blank" class="text-danger"><div>View Website</div></a>


                            @else
                                No Venue Details Added Yet
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@stop