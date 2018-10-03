<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStat extends Model
{
    public $timestamps = false;

    // Define Relationships

    public function player(){
        return $this->belongsto('App\Models\Player');
    }

    public function event(){
        return $this->belongsto('App\Models\Event');
    }

    public function league(){
        return $this->belongsto('App\Models\League');
    }

}
