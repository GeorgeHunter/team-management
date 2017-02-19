<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;

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
        return view('matches/create', compact('matches'));
    }

    public function store()
    {
        $match = new Match;

        $match->opponent = request('opponent');
        $match->venue = request('venue');
        $match->date_time = request('date_time');

        $match->save();

        return redirect('/matches');
    }

    public function show(Match $match)
    {
        return view('matches/show', compact('match'));
    }

}
