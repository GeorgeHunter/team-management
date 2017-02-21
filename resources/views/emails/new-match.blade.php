@component('mail::message')
# Introduction

Hi there,

Here's to let you know about a match on {{ $match->date_time->format('d M') }}, {{ $match->venue }} against {{ $match->opponent->name }}.

The match starts at {{ $match->date_time->format('h:i') }}

If you are interested in playing, please click below

@component('mail::button', ['url' => 'http://example.com'])
I'm available!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
