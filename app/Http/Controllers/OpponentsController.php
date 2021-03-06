<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opponent;
use App\Venue;
use App\Mail\NewMatch;

class OpponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opponents = Opponent::get();
//        header('Access-Control-Allow-Origin: *');
//        return $opponents;
        return view('opponents/index', compact('opponents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opponents = Opponent::get();
        $venues = Venue::get();
        return view('opponents/create', compact('opponents', 'venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Opponent $opponent)
    {
//        header('Access-Control-Allow-Origin: *');

        $opponent->name = $_POST['name'];
        $opponent->save();

        return redirect('/opponents');
//
//        Opponent::forceCreate([
//            'name' => request('name')
//        ]);
//        return "hello?";
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
