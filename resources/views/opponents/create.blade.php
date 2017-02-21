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
                <div class="row">
                    <div class="col-xs-11">
                        <label for="venue">Venue</label>
                        <select name="venue" id="venue" class="form-control">
                            @foreach ($venues as $venue)
                                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <div style="padding-top: 24px;">
                            <a href="/venues/create" class="btn btn-primary" style="font-size: 24px; padding: 14px; line-height: 24px;">+</a>
                        </div>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>

@stop