@extends('layouts.app')

@section('content')

    <div class="container">


        @foreach($opponents as $opponent)

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $opponent->name }}</h3>
                    </div>
                    <div class="panel-body">
                        {{ $opponent->venue->name }} <br>
                        Lat: <strong>{{ $opponent->venue->lat }}</strong> <br>
                        Long: <strong>{{ $opponent->venue->long }}</strong> <br>

                    </div>
                    <div class="panel-footer">
                        <a href="{{ $opponent->venue->website_url }}"><div>View Website</div></a>
                    </div>

                </div>

            @endforeach
        

        @admin
            <a href="/opponents/create" class="btn btn-primary">Add New</a>
        @endadmin

    </div>


@stop