<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Table name
    protected $table = 'members';

    // Primary Key
    public $primaryKey = 'id';

    // Define Relationships
    
    public function guild(){
        return $this->belongsTo('App\Models\Guild');
    }

    public function eventStats(){
        return $this->hasmany('App\Models\EventStat');
    }
}
