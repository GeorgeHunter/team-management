@extends('layouts.app')

@section('content')

    <div class="container padding">

        {{--{{ $messages }}--}}

        <div id="accordion" role="tablist" aria-multiselectable="true">


            @foreach ($messages as $message)

                <div class="card mb-4" style="position: relative;">
                    @if (!$message->read)
                        <form method="POST" action="/messages/{{ $message->id }}/mark-as-read" class="d-inline-block" style="position: absolute; right: 6px; top: 6px;">
                            <input type="number" value="{{$message->id}}" hidden name="message_id">
                            <button type="submit" style="border: none; background: transparent;"><i class="fa fa-circle-o fa-2x text-warning" aria-hidden="true"></i></button>
                        </form>
                    @else
                        <form method="POST" action="/messages/{{ $message->id }}/mark-as-unread" class="d-inline-block" style="position: absolute; right: 6px; top: 8px;">
                            <input type="number" value="{{$message->id}}" hidden name="message_id">
                            <button type="submit" style="border: none; background: transparent;"><i class="fa fa-check-circle-o fa-2x text-success" aria-hidden="true"></i></button>
                        </form>
                        {{--<i class="fa fa-check-circle-o fa-2x text-success mr-2" aria-hidden="true" style="position: absolute; right: 6px; top: 8px;"></i>--}}
                    @endif
                    <div class="card-header" role="tab" id="tab{{$message->id}}">
                        <div data-toggle="collapse" href="#collapse{{$message->id}}" aria-expanded="true" aria-controls="collapse{{$message->id}}">

                            {{ $message->from }} | <strong>{{ $message->sent }}</strong>
                        </div>
                    </div>

                    <div id="collapse{{$message->id}}" class="collapse @if(!$message->read) show @endif" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            <div><strong>{{ $message->subject }}</strong></div>
                            <div>{{ $message->body }}</div>
                        </div>
                    </div>


                </div>

            @endforeach

        </div>


        {{--<ul class="nav nav-tabs nav-justified" style="margin-bottom: 12px;">--}}
            {{--<li class="active">--}}
                {{--<a data-toggle="tab" href="#byDate">Sort by Date</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a data-toggle="tab" href="#byPlayer">Sort by Player</a>--}}
            {{--</li>--}}
        {{--</ul>--}}

        {{--<div class="tab-content">--}}
            {{--<div id="byDate" class="tab-pane fade in active">--}}
                {{--@if (count($messages))--}}
                    {{--@foreach ($messages as $message)--}}

                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading bg-primary">{{ $message->from }} <span class="pull-right">Date</span></div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<p><strong>Message Subject here!!</strong></p>--}}
                                {{--{!! $message->message !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--@endforeach--}}
                {{--@else--}}
                    {{--<p>No messages received yet</p>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div id="byPlayer" class="tab-pane fade">--}}
                {{--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">--}}

                    {{--@foreach($players as $player)--}}

                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading" role="tab" id="headingOne">--}}
                                {{--<h4 class="panel-title">--}}
                                    {{--<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $player->id }}" aria-expanded="true" aria-controls="collapseOne">--}}
                                        {{--{{ $player->first_name }} {{ $player->last_name }}--}}
                                    {{--</a>--}}
                                {{--</h4>--}}
                            {{--</div>--}}
                            {{--<div id="collapse{{ $player->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">--}}
                                {{--<div class="panel-body">--}}
                                    {{--@if (count($player->messages))--}}
                                        {{--@foreach($player->messages as $message)--}}

                                            {{--<p>{{ $message->message }}</p>--}}

                                        {{--@endforeach--}}
                                    {{--@else--}}
                                        {{--<p>No messages from {{ $player->first_name }} yet</p>--}}
                                    {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



    </div>

@stop