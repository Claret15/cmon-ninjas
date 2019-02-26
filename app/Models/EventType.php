<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
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
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
