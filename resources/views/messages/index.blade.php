@extends('layouts.app')

@section('content')

    <div class="container padding">

        {{--{{ $messages }}--}}

        <message></message>

        <div id="accordion" role="tablist" aria-multiselectable="true">


            @foreach ($messages as $message)

                @if (Auth::User()->player && Auth::User()->player->email == $message->from)


                {{--<div class="card mb-4" style="position: relative;">--}}
                    {{--@if (!$message->read)--}}
                        {{--<form method="POST" action="/messages/{{ $message->id }}/mark-as-read" class="d-inline-block" style="position: absolute; right: 6px; top: 6px;">--}}
                            {{--<input type="number" value="{{$message->id}}" hidden name="message_id">--}}
                            {{--<button type="submit" style="border: none; background: transparent;"><i class="fa fa-circle-o fa-2x text-warning" aria-hidden="true"></i></button>--}}
                        {{--</form>--}}
                    {{--@else--}}
                        {{--<form method="POST" action="/messages/{{ $message->id }}/mark-as-unread" class="d-inline-block" style="position: absolute; right: 6px; top: 8px;">--}}
                            {{--<input type="number" value="{{$message->id}}" hidden name="message_id">--}}
                            {{--<button type="submit" style="border: none; background: transparent;"><i class="fa fa-check-circle-o fa-2x text-success" aria-hidden="true"></i></button>--}}
                        {{--</form>--}}
                        {{--<i class="fa fa-check-circle-o fa-2x text-success mr-2" aria-hidden="true" style="position: absolute; right: 6px; top: 8px;"></i>--}}
                    {{--@endif--}}
                    {{--<div class="card-header" role="tab" id="tab{{$message->id}}">--}}
                        {{--<div data-toggle="collapse" href="#collapse{{$message->id}}" aria-expanded="true" aria-controls="collapse{{$message->id}}">--}}

                            {{--{{ $message->from }} | <strong>{{ $message->sent }}</strong>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div id="collapse{{$message->id}}" class="collapse @if(!$message->read) show @endif" role="tabpanel" aria-labelledby="headingOne">--}}
                        {{--<div class="card-block">--}}
                            {{--<div class="mb-4"><strong>{{ $message->subject }}</strong></div>--}}
                            {{--<div>{!! $message->body !!}</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}

                    @else
                    @if ($loop->first)
                    <div class="alert alert-info">
                        You haven't received any messages yet
                    </div>
                    @endif
                @endif
            @endforeach

        </div>






    </div>

@stop