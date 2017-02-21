@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/venues">

            {{ csrf_field() }}


            <div class="form-group">
                <div class="row">
                    <div class="col-xs-11">
                        <label for="opponent_id">Opponent</label>
                        <select name="opponent_id" id="opponent_id" class="form-control">
                            <option value="">Select</option>
                            @foreach($opponents as $opponent)
                                <option value="{{ $opponent->id }}">{{ $opponent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <div style="padding-top: 24px;">
                            <a href="/opponents/create" class="btn btn-primary" style="font-size: 24px; padding: 14px; line-height: 24px;">+</a>
                        </div>
                    </div>
                </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control typeahead" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" class="form-control typeahead" id="lat" name="lat" placeholder="Latitude">
            </div>

            <div class="form-group">
                <label for="long">Longitude</label>
                <input type="text" class="form-control typeahead" id="long" name="long" placeholder="Longitude">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

@stop