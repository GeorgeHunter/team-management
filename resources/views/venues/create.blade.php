@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/venues" class="mb-4">

            {{ csrf_field() }}


            <div class="form-group">
                <label for="opponent_id">Opponent</label>
                <select name="opponent_id" id="opponent_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($opponents as $opponent)
                        <option value="{{ $opponent->id }}">{{ $opponent->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control typeahead" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="address_1">Address Line 1</label>
                <input type="text" class="form-control" id="address_1" name="address_1" placeholder="Address Line 1">
            </div>

            <div class="form-group">
                <label for="address_2">Address Line 2</label>
                <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Address Line 2">
            </div>

            <div class="form-group">
                <label for="address_3">Address Line 3</label>
                <input type="text" class="form-control" id="address_3" name="address_3" placeholder="Address Line 3">
            </div>

            <div class="form-group">
                <label for="town">Town</label>
                <input type="text" class="form-control" id="town" name="town" placeholder="Town">
            </div>

            <div class="form-group">
                <label for="county">County</label>
                <input type="text" class="form-control" id="county" name="county" placeholder="County">
            </div>

            <div class="form-group">
                <label for="post_code">Post Code</label>
                <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Post Code">
            </div>

            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" class="form-control typeahead" id="lat" name="lat" placeholder="Latitude">
            </div>

            <div class="form-group">
                <label for="long">Longitude</label>
                <input type="text" class="form-control typeahead" id="long" name="long" placeholder="Longitude">
            </div>

            <div class="form-group">
                <label for="website_url">Website URL</label>
                <input type="text" class="form-control typeahead" id="website_url" name="website_url" placeholder="URL">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>

@stop