<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now(); // For comparison purposes in the view

        if (!empty(\Auth::User()->player)) {
            $user_pairings = \Auth::User()->player->pairing;
            return view('home', compact('now', 'user_pairings'));
        } else {

            return view('home', compact('now'));
        }

    }

    public function dashboard()
    {
//        $now = Carbon::now(); // For comparison purposes in the view

//        $user_pairings = \Auth::User()->player->pairing;

        return view('dashboard');
    }
}
