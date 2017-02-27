<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public $timestamps = false;
    protected $dates = ['date_time'];

    public function pairing()
    {
        return $this->belongsToMany('App\Pairing')->withPivot('points');
    }

    public function opponent()
    {
        return $this->belongsTo('App\Opponent');
    }

    public function player()
    {
        return $this->belongsToMany('App\Player')->withPivot('paid', 'emailed', 'available');
    }
}
