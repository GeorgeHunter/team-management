@extends('layouts.app')

@section('content')

    <div class="container">

        {{--{{ $messages }}--}}

        @foreach ($messages as $message)

            <div class="panel panel-default">
                <div class="panel-heading">{{ $message->from }}</div>
                <div class="panel-body">
                    {!! $message->message !!}
                </div>
            </div>

        @endforeach

    </div>

@stop