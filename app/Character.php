<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'character_schedules')->withTimestamps();
    }
}
