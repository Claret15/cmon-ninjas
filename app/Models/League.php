<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    
    // Disable timestamps for this model
    public $timestamps = false;
    
    // Define Relationships

    public function eventStats(){
        return $this->hasMany('App\Models\EventStat');
    }
}
