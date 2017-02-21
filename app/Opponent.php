<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opponent extends Model
{
    public function venue()
    {
        return $this->hasOne('App\Venue');
    }
    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
