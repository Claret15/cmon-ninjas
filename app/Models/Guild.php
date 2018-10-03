<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    // Table name
    protected $table = 'guilds';

    // Primary Key
    public $primaryKey = 'id';

    // Disable timestamps for this model
    public $timestamps = false;

    // Define Relationships
    public function players(){
        return $this->hasMany('App\Models\Player');
    }

    public function eventStats(){
        return $this->hasManyThrough('App\Models\EventStat', 'App\Models\Player');
    }
}
