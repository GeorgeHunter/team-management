@extends('layouts.app')

@section('content')

<img src="/images/home-banner.jpg" class="banner__img" style="margin-top: -44px;">
    
<div class="container">
    <div class="row">

        <div class="col-xs-12">
            <h1>Next Match</h1>
{{--            @php(var_dump($next_match->opponent))--}}
{{--            {{ $next_match->groupBy('date') }}--}}
        </div>

    </div>
</div>
@endsection
