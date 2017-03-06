@extends('layouts.app')

@section('content')


    <div class="container mt-4">
        @if(Auth::User()->player)



                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">My Matches</h3>
                    </div>
                    <div class="card-block">

                        @if (!empty(Auth::User()->player->match))
                            <table class="table">
                                <tr style="font-weight: bold;">
                                    <td style="padding: 6px;">Opponent</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Paid</td>
                                    {{--<td style="width: 100px;">Available</td>--}}
                                    {{--<td style="width: 100px;">Not Available</td>--}}
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
                                        {{--<td style="width: 100px;">Available</td>--}}
                                        {{--<td style="width: 180px;">Not Available</td>--}}
                                        {{--<td style="width: 100px;">--}}
                                        {{--@if ($my_match->pivot->available == 1)--}}
                                        {{--<button class="btn btn-primary">--}}
                                        {{--I'm Available--}}
                                        {{--</button>--}}
                                        {{--@else--}}
                                        {{--<button class="btn btn-danger">--}}
                                        {{--No longer availabe--}}
                                        {{--</button>--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                @else
                                    Looks like you haven't played any matches yet
                                @endif
                            </table>




                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Messages</h3>
                    </div>
                    <div class="card-block">
                        <table class="table">
                            <thead class="bg-info text-white">
                            <tr>
                                <td>From</td>
                                <td>Subject</td>
                                <td>Body</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Auth::User()->player->messages as $message)
                                <tr>
                                    <td>{{ $message->from }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->body }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ Auth::User()->player->messages }}
                    </div>
                </div>


        @endif
        
        <div class="alert alert-warning">
            Your user isn't associated with an email in our records. You've probably signed up with a different
            email than in our records. Contact <a href="mailto:help@mail.wheatill.club">help@mail.wheatill.club</a> for more help
        </div>


    </div>


@stop