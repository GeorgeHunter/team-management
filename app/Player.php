<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function pairing()
    {
        return $this->belongsToMany('App\Pairing');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'email', 'email');
    }

    public function match()
    {
        return $this->belongsToMany('App\Match')->withPivot('paid', 'emailed');
    }
}
