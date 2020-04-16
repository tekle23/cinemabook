<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = array();
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_schedules')->withTimestamps();
    }

}
