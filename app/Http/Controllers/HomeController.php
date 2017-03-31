<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Match;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now(); // For comparison purposes in the view
        $next_match = Match::orderBy('date_time')->where('date_time', '>=', '2017-03-27')->first();
        $future_matches = Match::orderBy('date_time')->where('date_time', '>=', '2017-03-27')->get();
        $results = Match::orderBy('date_time')->where('date_time', '<=', '2017-03-27')->get();


        return view('home', compact('now', 'next_match', 'future_matches', 'results'));

    }

    public function dashboard()
    {
//        $now = Carbon::now(); // For comparison purposes in the view

//        $user_pairings = \Auth::User()->player->pairing;

        return view('dashboard');
    }

}
