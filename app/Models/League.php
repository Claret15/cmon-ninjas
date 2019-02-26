<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    /**
     * Remove default timestamps from model
     * @var array
     */
    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Define Relationships
     */
    public function eventStats()
    {
        return $this->hasMany('App\Models\EventStat');
    }
}
