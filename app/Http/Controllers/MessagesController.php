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

    public function sendMail(Request $request, Message $message)
    {

        // store the message
        $players = $request->players;
        $match_id = $request->match_id;
        $match = Match::find($match_id);

        $match->player()->attach($players);

        foreach ($match->player as $player) {
            if (in_array($player->id, $players) && $player->emailed == 0    ) {
                $send_to = Player::find($player->id);


                $message->from = $send_to->email;
//                $message->body = "Match is $match->venue against $match->opponent";
                // Vars for the message
                $match_date_time = $match->date_time->format('d M');
                $match_venue = $match->venue;
                $match_opponent_name = $match->opponent->name;
                $match_start_time = $match->date_time->format('H:i');

                $message->subject = "Match against $match_opponent_name on $match_date_time";
                $message->body = "<p>Just a quick email to let you know about a match on $match_date_time, $match_venue against $match_opponent_name.</p>The match starts at $match_start_time. As usual navy trousers, white shirt and navy jumper are preferred. Food is available after the match and the total cost is £12.";
                $message->sent = Carbon::now();
                $message->read = 0;

                $message->save();
            }
        }

        // set the emailed value
        foreach ($match->player as $player) {
            if (in_array($player->id, $players) && $player->emailed == 0    ) {
                echo $player->pivot->emailed = 1;
                $player->pivot->save();
            }
        }


        //send the mail
        if (false) {
            foreach ($players as $player_select) {
                $player = Player::find($player_select);
                \Mail::to($player->email)->send(new NewMatch($match, $player));
            }
        }

        return redirect('/matches')->with('emails-sent', 'Emails have been sent!');

    }

    public function receiveMail (Message $message)
    {

        $message->from = $_POST['From'];
        $message->body = $_POST['stripped-html'];
        $message->sent = $_POST['timestamp'];
        $message->subject = $_POST['Subject'];

        $message->save();
    }

    public function markAsRead($message_param)
    {
        $message = Message::find($message_param);
        $message->read = 1;
        $message->save();
    }

    public function markAsUnread($message_param)
    {
        $message = Message::find($message_param);
        $message->read = 0;
        $message->save();
    }

    public function messagesJson()
    {
        $messages = Message::get();
        return $messages;
    }

}
