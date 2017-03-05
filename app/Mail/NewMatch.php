<?php

namespace App\Mail;

use App\Match;
use App\Player;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMatch extends Mailable
{

    use Queueable, SerializesModels;
    public $match;
    public $player;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Match $match, Player $player)
    {
        $this->match = $match;
        $this->player = $player;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-match');
    }
}
