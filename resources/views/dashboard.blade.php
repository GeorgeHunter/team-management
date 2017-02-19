@extends('layouts.app')

@section('content')

    <div class="container">

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
                <table>
                    <tr style="font-weight: bold;">
                        <td style="padding: 6px;">Opponent</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Paid</td>
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
                        </tr>
                    @endforeach
                </table>

                    

                
            </div>
        </div>


    </div>

@stop