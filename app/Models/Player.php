<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // Table name
    protected $table = 'players';

    // Primary Key
    public $primaryKey = 'id';

    // Define Relationships
    
    public function guild(){
        return $this->belongsTo('App\Models\Guild');
    }

    public function eventstat(){
        return $this->hasmany('App\Models\EventStat');
    }
}
