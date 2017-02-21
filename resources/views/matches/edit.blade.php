@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/matches/edit/{{ $match->id }}">

            {{ csrf_field() }}

            {{--<input type="text" value="{{ $match->venue }}">--}}

            @php ( $super_id = $match->id )

            @foreach($pairings as $pairing)

                @php($checked = false)

                @foreach ($pairing->matches as $match)
                    @if ( $match->pivot->match_id == $super_id)
                        @php( $checked = true)
                    @endif
                @endforeach

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="pairings[]" value="{{ $pairing->id }}"
                        @if ($checked)
                            checked
                        @endif
                        > {{ $pairing->player }}
                    </label>
                </div>


            @endforeach

            <button type="submit">Submit</button>

        </form>

        <br></br>

        <a href="/matches/{{ $match->id }}" class="btn btn-primary">Back to Overview</a>

    </div>

@stop