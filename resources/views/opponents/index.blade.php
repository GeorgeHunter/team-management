@extends('layouts.app')

@section('content')

    <div class="container">

        <ul>
        
        @foreach($opponents as $opponent)

            <li>{{ $opponent->name }}</li>

            <ul>
            @foreach($opponent->matches as $match)


            <li>{{ $match }}</li>

            @endforeach
            <li>{{ $opponent->venue }}</li>

            </ul>

            @endforeach
        
        </ul>

        <a href="/opponents/create" class="btn btn-primary">Add New</a>

    </div>


@stop