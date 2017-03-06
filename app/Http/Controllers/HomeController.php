<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Match;

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
        $matches = Match::get();
        $next_match = Match::get()->where('date_time', '>', $now)->first();

//        if (!empty(\Auth::User()->player)) {
//            $user_pairings = \Auth::User()->player->pairing;
//            return view('home', compact('now', 'user_pairings'));
//        } else {

            return view('home', compact('now', 'next_match'));
//        }

    }

    public function dashboard()
    {
//        $now = Carbon::now(); // For comparison purposes in the view

//        $user_pairings = \Auth::User()->player->pairing;

        return view('dashboard');
    }
}
