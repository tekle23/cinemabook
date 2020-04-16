<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $guarded = array();
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}
