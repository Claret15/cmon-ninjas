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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'event_id', 'member_id', 'guild_pts', 'position', 'league_id', 'solo_rank', 'global_rank',
    ];

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
