@extends('layouts.app')

@section('content')

    <div class="container">

        <ul>
        @foreach($venues as $venue)

        <li>    {{ $venue }}</li>

        @endforeach
        </ul>

        <a href="/venues/create" class="btn btn-primary">Add New</a>

    </div>

@stop