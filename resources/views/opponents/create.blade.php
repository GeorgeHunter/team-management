@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/opponents">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control typeahead" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="url">Website URL</label>
                <input type="text" class="form-control typeahead" id="url" name="url" placeholder="URL">
            </div>

            <div class="form-group">
                        <label for="venue">Venue</label>
                        <select name="venue" id="venue" class="form-control">
                            @foreach ($venues as $venue)
                                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                            @endforeach
                        </select>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>

@stop