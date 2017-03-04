@extends('layouts.app')

@section('content')

    <div class="container mt-4">


        @foreach($opponents as $opponent)

                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="panel-title mb-0">{{ $opponent->name }}</h6>
                    </div>
                    <div class="card-block">
                        @if (!empty ($opponent->venue))
                                {{ $opponent->venue->name }} <br>
                                Lat: <strong>{{ $opponent->venue->lat }}</strong> <br>
                                Long: <strong>{{ $opponent->venue->long }}</strong> <br>
                            </div>

                            <div class="card-footer">
                                <a href="{{ $opponent->venue->website_url }}"><div>View Website</div></a>


                        @else
                            No Venue Details Added Yet
                        @endif
                    </div>
                </div>

            @endforeach


        @admin
            <a href="/opponents/create" class="btn btn-primary">Add New</a>
        @endadmin

    </div>


@stop