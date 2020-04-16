<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = array();

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}

