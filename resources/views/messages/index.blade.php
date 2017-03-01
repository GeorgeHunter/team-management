@extends('layouts.app')

@section('content')

    <div class="container padding">

        {{--{{ $messages }}--}}

        <ul class="nav nav-tabs nav-justified" style="margin-bottom: 12px;">
            <li class="active">
                <a data-toggle="tab" href="#byDate">Sort by Date</a>
            </li>
            <li>
                <a data-toggle="tab" href="#byPlayer">Sort by Player</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="byDate" class="tab-pane fade in active">
                @foreach ($messages as $message)

                    <div class="panel panel-default">
                        <div class="panel-heading bg-primary">{{ $message->from }} <span class="pull-right">Date</span></div>
                        <div class="panel-body">
                            <p><strong>Message Subject here!!</strong></p>
                            {!! $message->message !!}
                        </div>
                    </div>

                @endforeach
            </div>
            <div id="byPlayer" class="tab-pane fade">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    @foreach($players as $player)

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $player->id }}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $player->first_name }} {{ $player->last_name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $player->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    @foreach($player->messages as $message)

                                        <p>{{ $message->message }}</p>

                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>



    </div>

@stop