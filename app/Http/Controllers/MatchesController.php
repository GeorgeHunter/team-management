<?php

namespace App\Http\Controllers;

use App\Opponent;
use App\Player;
use Illuminate\Http\Request;
use App\Match;
use App\Pairing;
use App\Mail\NewMatch;
use Carbon\Carbon;

class MatchesController extends Controller
{
    public function index()
    {
        $matches = Match::get();
        $now = Carbon::now();
        return view('matches/index', compact('matches', 'now'));
    }

    public function create()
    {
        $matches = Match::get();
        $pairings = Pairing::get();
        $opponents = Opponent::get();
        return view('matches/create', compact('matches', 'pairings', 'opponents'));
    }

    public function store()
    {
        $match = new Match;

        $match->opponent_id = request('opponent_id');
        $match->venue = request('venue');
        $match->date_time = request('date_time');

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



    public function makePayment(Request $request)
    {
        $match_id = $request->match;

        $pivot_table = $request->user()->player->match->where('id', $match_id)->first()->pivot;
        $pivot_table->paid = 1;
        $pivot_table->save();

    }

    public function available(Request $request)
    {

        $match = Match::find($request->match_id);
        $player = $match->player->where('id', $request->player_id)->first();
        $player->pivot->available = 1;


        $player->pivot->save();

        return redirect("/matches/$match->id")->with('thanks_text', 'Thank you for signing up for the match');

    }

    public function unavailable(Request $request)
    {

        $match = Match::find($request->match_id);
        $player = $match->player->where('id', $request->player_id)->first();
        $player->pivot->not_available = 1;


        $player->pivot->save();

        return redirect("/matches/$match->id")->with('unthanks_text', 'No worries, hopefully see you next time');

    }
}
