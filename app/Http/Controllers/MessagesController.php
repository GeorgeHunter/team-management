<?php

namespace App\Http\Controllers;

use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use App\Match;
use App\Mail\NewMatch;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        $players = Player::all();

        return view('messages/index', compact('messages', 'players'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function sendMail(Request $request)
    {

        // store the message






//send with mailgun
        $players = $request->players;
        $match_id = $request->match_id;
        $match = Match::find($match_id);




        $match->player()->attach($players);

        foreach ($match->player as $player) {
            if (in_array($player->id, $players)) {
                $send_to = Player::find($player->id);

                $message = new Message;
                $message->from = $send_to->email;
                $message->subject = "Email about $match->date_time->format(d-M-Y)";
                $message->body = "Match is $match->venue against $match->opponent";
                $message->sent = Carbon::now();
                $message->read = 0;

                $message->save();
            }
        }

        foreach ($match->player as $player) {
            if (in_array($player->id, $players)) {
                echo $player->pivot->emailed = 1;
                $player->pivot->save();
            }
        }

        foreach ($players as $player_select) {
            $player = Player::find($player_select);
            \Mail::to($player->email)->send(new NewMatch($match, $player));
        }


        return redirect('/matches')->with('emails-sent', 'Emails have been sent!');

    }

    public function receiveMail ()
    {

        $message = new Message;

        $message->from = $_POST['From'];
        $message->body = $_POST['stripped-html'];
        $message->sent = $_POST['timestamp'];
        $message->subject = $_POST['Subject'];

        $message->save();
    }

    public function markAsRead()
    {
        $message_id = request('message_id');
//        dd($request);
        $message = Message::find($message_id);
        $message->read = 1;
        $message->save();

        return redirect("/messages/#tab{$message_id}");
    }

    public function markAsUnread()
    {
        $message_id = request('message_id');
//        dd($request);
        $message = Message::find($message_id);
        $message->read = 0;
        $message->save();

        return redirect("/messages/#tab{$message_id}");
    }

}
