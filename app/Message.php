<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function player()
    {
        return $this->belongsTo('App\Player', 'from', 'email');
    }
}
