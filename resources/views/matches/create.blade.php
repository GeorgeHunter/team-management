@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/matches">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="opponent">Opponent</label>
                <input type="text" class="form-control typeahead" id="opponent" name="opponent" placeholder="Opponent">
            </div>
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" class="form-control typeahead" id="venue" name="venue" placeholder="Venue">
            </div>
            <div class="form-group">
                <label for="date_time">Date/Time</label>
                <input type="text" class="form-control typeahead" id="date_time" name="date_time" placeholder="yyyy-mm-dd hh:mm:ss">
            </div>
            <button type="Submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
