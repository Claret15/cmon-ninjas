<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStat extends Model
{
    public $timestamps = false;

    // Define Relationships

    public function member(){
        return $this->belongsto('App\Models\Member');
    }

    public function event(){
        return $this->belongsto('App\Models\Event');
    }

    public function league(){
        return $this->belongsto('App\Models\League');
    }

    /**
     * Define number accessors
     */
    public function getGuildPtsAttribute($value)
    {
        return number_format($value);
    }

    public function getSoloPtsAttribute($value)
    {
        return number_format($value);
    }

    public function getSoloRankAttribute($value)
    {
        return number_format($value);
    }

    public function getGlobalRankAttribute($value)
    {
        return number_format($value);
    }


}
