<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Opponent;

/**
 * Class VenuesController
 * @package App\Http\Controllers
 */
class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::get();
        return view('venues/index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = Venue::get();
        $opponents = Opponent::get();

        return view('venues/create', compact('venues', 'opponents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Venue $venue)
    {

        $venue->opponent_id = request('opponent_id');
        $venue->name = request('name');
        $venue->address_1 = request('address_1');
        $venue->address_2 = request('address_2');
        $venue->address_3 = request('address_3');
        $venue->town = request('town');
        $venue->county = request('county');
        $venue->post_code = request('post_code');
        $venue->lat = request('lat');
        $venue->long= request('long');
        $venue->website_url= request('website_url');

        $venue->save();

        return redirect('/opponents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
