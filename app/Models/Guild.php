<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    // Table name
    protected $table = 'guilds';

    // Primary Key
    public $primaryKey = 'id';

    /**
     * Remove default timestamps from model
     * @var array
     */ 
    public $timestamps = false;

    /**
     * Define Relationships 
     */
    public function members(){
        return $this->hasMany('App\Models\Member');
    }

    public function eventStats(){
        return $this->hasManyThrough('App\Models\EventStat', 'App\Models\Member');
    }
}
