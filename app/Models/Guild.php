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
    public function player(){
        return $this->hasMany('App\Models\Player');
    }
}
