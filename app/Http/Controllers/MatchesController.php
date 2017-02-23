<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use App\Match;
use App\Pairing;
use App\Mail\NewMatch;

class MatchesController extends Controller
{
    public function index()
    {
        $matches = Match::get();
        return view('matches/index', compact('matches'));
    }

    public function create()
    {
        $matches = Match::get();
        $pairings = Pairing::get();
        return view('matches/create', compact('matches', 'pairings'));
    }

    public function store()
    {
        $match = new Match;

        $match->opponent_id = 1;
        $match->venue = request('venue');
        $match->date_time = request('date_time');
//        dd($match);

        $match->save();


        return redirect('/matches');
    }

    public function show(Match $match)
    {
        return view('matches/show', compact('match'));
    }

    public function edit(Match $match)
    {
        $pairings = Pairing::get();
        return view('matches/edit', compact('match', 'pairings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {

        $pairings = $request->pairings;

        if ( is_array($pairings)) {
            $match->pairing()->sync($pairings);
        }

        return redirect('matches/edit/' . $match->id);

    }

    public function buildMail(Match $match)
    {
        $players = Player::get();
        return view('matches.build-mail', compact('players', 'match'));
    }

    public function sendMail(Request $request)
    {

        $players = $request->players;
        $match_id = $request->match_id;
        $match = Match::find($match_id);

        $match->player()->attach($players);

        foreach ($match->player as $player) {
            if (in_array($player->id, $players)) {
                echo $player->pivot->emailed = 1;
                $player->pivot->save();
            }
        }

        $email_to = [];
        foreach ($players as $player) {
            $player_obj = Player::find($player);
            $player_email = $player_obj->email;
            array_push($email_to, $player_email);
        }

        foreach ($email_to as $email) {
            \Mail::to($email)->send(new NewMatch($match));
        }

        return redirect('/matches')->with('emails-sent', 'Emails have been sent!');

    }

    public function makePayment(Request $request)
    {
        $match_id = $request->match;

        $pivot_table = $request->user()->player->match->where('id', $match_id)->first()->pivot;
        $pivot_table->paid = 1;
        $pivot_table->save();
    }
}
