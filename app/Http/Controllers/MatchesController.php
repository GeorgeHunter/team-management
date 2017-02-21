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




        $emails = $request->emails;
        $match_id = $request->match_id;
        $match = Match::find($match_id);

//        $match = Match::find(1);
        foreach ($emails as $email) {
            \Mail::to($email)->send(new NewMatch($match));
        }

        return redirect('/matches');

    }


}
