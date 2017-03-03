@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/matches">
{{--            {{ csrf_field() }}--}}
            <div class="form-group">
                <label for="opponent_id">Opponent</label>
                <select name="opponent_id" id="opponent_id" class="form-control">
                    @foreach ($opponents as $opponent)
                        <option value="{{ $opponent->id }}">{{ $opponent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="venue">Home/ Away</label>
                <select name="venue" id="venue" class="form-control">
                    <option value="home">Home</option>
                    <option value="away">Away</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_time">Date/Time (yyyy-mm-dd hh:mm:ss)</label>
                <input type="text" class="form-control typeahead" id="date_time" name="date_time" placeholder="yyyy-mm-dd hh:mm:ss">
            </div>




            <br>
            



            <button type="Submit" class="btn btn-primary">Add</button>

        </form>
    </div>
@endsection
