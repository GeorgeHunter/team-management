@component('mail::message')

<hr>
Hi {{ $player->first_name }},

Just a quick email to let you know about a match on {{ $match->date_time->format('d M') }}, {{ $match->venue }} against {{ $match->opponent->name }}.

The match starts at {{ $match->date_time->format('H:i') }}. As usual navy trousers, white shirt and navy jumper are preferred. Food is available after the match and the total cost is £12.

If you are interested in playing, please click below

@component('mail::button', ['url' => "http://team-management.dev/matches/$match->id/available/$player->id"])
I'm available!
@endcomponent

@component('mail::button', ['url' => "http://team-management.dev/matches/$match->id/unavailable/$player->id"])
I'm not available!
@endcomponent

Thanks,<br>
George Hunter
@endcomponent
