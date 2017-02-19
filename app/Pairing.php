<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    public function player()
    {
        return $this->belongsToMany('App\Player');
    }
    public function matches()
    {
        return $this->belongsToMany('App\Match')->withPivot('points');
    }
}
