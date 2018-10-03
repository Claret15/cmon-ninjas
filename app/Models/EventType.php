<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    // Disable timestamps for this model
    public $timestamps = false;

    // Define Relationships

    public function events(){
        return $this->hasMany('App\Models\Event');
    }


}
