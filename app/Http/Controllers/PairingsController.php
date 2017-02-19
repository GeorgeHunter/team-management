<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pairing;

class PairingsController extends Controller
{
    public function index ()
    {
        $pairings = \App\Pairing::get();
        return view('pairings/index', compact('pairings'));
    }
}
