<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'event_date',
    ];

    /**
     * Remove default timestamps from model
     * @var array
     */
    public $timestamps = false;
    
    /**
     * Define Relationships 
     */

    public function eventType(){
        return $this->belongsTo('App\Models\EventType');
    }

    public function eventStats(){
        return $this->hasMany('App\Models\EventStat');
    }
}
