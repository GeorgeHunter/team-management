@extends('layouts.app')

@section('content')

    <div class="container">




        <div class="right_col">

            <style>
                td {
                    padding: 6px;
                }
            </style>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">My Matches</h3>
                </div>
                <div class="panel-body">

                        @if (!empty($user->player->match))
                        <table class="table">
                            <tr style="font-weight: bold;">
                                <td style="padding: 6px;">Opponent</td>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Paid</td>
                                <td style="width: 100px;">I'm Available</td>
                            </tr>
                            @foreach( Auth::User()->player->match as $my_match)
                                <tr>
                                    <td style="padding: 6px;">{{ $my_match->opponent->name }}</td>
                                    <td>{{ $my_match->date_time->format('d-M-Y') }}</td>
                                    <td>{{ $my_match->date_time->format('h:i') }}</td>
                                    <td>
                                        @if ($my_match->pivot->paid ) tick @endif
                                        @if ( !$my_match->pivot->paid ) X @endif

                                    </td>
                                    <td style="width: 100px;">
                                        @if ($my_match->pivot->available == 1)
                                            <button class="btn btn-primary">
                                                I'm Available
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                No longer availabe
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            Looks like you haven't played any matches yet
                        @endif
                    </table>




                </div>
            </div>


        </div>




    </div>

@stop