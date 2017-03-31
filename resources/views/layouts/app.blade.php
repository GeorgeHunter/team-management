<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">

        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')

    </div>

    <!-- Scripts -->


    {{--<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>--}}
    {{--<script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.min.js"></script>--}}

    {{--<script>--}}
            {{--var substringMatcher = function(strs) {--}}
                {{--return function findMatches(q, cb) {--}}
                    {{--var matches, substringRegex;--}}

                    {{--// an array that will be populated with substring matches--}}
                    {{--matches = [];--}}

                    {{--// regex used to determine if a string contains the substring `q`--}}
                    {{--substrRegex = new RegExp(q, 'i');--}}

                    {{--// iterate through the pool of strings and for any string that--}}
                    {{--// contains the substring `q`, add it to the `matches` array--}}
                    {{--$.each(strs, function(i, str) {--}}
                        {{--if (substrRegex.test(str)) {--}}
                            {{--matches.push(str);--}}
                        {{--}--}}
                    {{--});--}}

                    {{--cb(matches);--}}
                {{--};--}}
            {{--};--}}

            {{--var opponents = ['Wincanton', 'Sturminster Marshall', 'Folke', 'Cannington', 'XX'--}}
            {{--];--}}

            {{--$('.typeahead#opponent').typeahead({--}}
                    {{--hint: true,--}}
                    {{--highlight: true,--}}
                    {{--minLength: 1--}}
                {{--},--}}
                {{--{--}}
                    {{--name: 'opponents',--}}
                    {{--source: substringMatcher(opponents)--}}
            {{--});--}}


    {{--</script>--}}
    {{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
