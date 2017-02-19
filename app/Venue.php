<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function opponent()
    {
        return $this->belongsTo('App\Opponent');
    }
}
