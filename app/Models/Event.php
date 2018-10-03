<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $dateFormat = 'Y-M-d';
    public $timestamps = false;
    
    // Define Relationships

    public function eventType(){
        return $this->belongsTo('App\Models\EventType');
    }

    public function eventStats(){
        return $this->hasMany('App\Models\EventStat');
    }
}
