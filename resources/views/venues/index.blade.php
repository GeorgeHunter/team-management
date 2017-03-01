@extends('layouts.app')

@section('content')

    <div class="container">

        <ul>
        @foreach($venues as $venue)

        <li>    {{ $venue }}</li>

        @endforeach
        </ul>

        @admin
            <a href="/venues/create" class="btn btn-primary">Add New</a>
        @endadmin
    </div>

@stop