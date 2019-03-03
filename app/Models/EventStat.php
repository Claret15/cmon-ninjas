<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStat extends Model
{
    /**
     * Remove default timestamps from model
     * @var array
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    /**
     * Define Relationships
     */
    public function member()
    {
        return $this->belongsto('App\Models\Member');
    }

    public function event()
    {
        return $this->belongsto('App\Models\Event');
    }

    public function league()
    {
        return $this->belongsto('App\Models\League');
    }
}
