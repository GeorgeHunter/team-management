@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/players">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
            </div>

            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
            </div>

            <div class="form-group">
                <label for="name">Handicap</label>
                <input type="number" class="form-control" id="handicap" name="handicap" placeholder="Handicap">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop