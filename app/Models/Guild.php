<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $table = 'guilds';

    public $primaryKey = 'id';

    protected $fillable = ['name'];

    /**
     * Remove default timestamps from model
     * @var array
     */
    public $timestamps = false;

    public function addGuild($request)
    {
        $this->create($request->all());
    }

    public function edit($request)
    {
        $this->update($request->all());
    }

    public function remove()
    {
        $this->delete();
    }

    // Local Scopes

    /**
     * Scope a query to return all guilds in alphbetical order
     * Eager Load EventType
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllGuilds($query)
    {
        return $query->get()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function getEventStats($id)
    {
        return $this->eventStats()
            ->with('league', 'event', 'member')
            ->where('event_id', $id)
            ->orderby('guild_pts', 'desc')
            ->get();
    }

    public function getTotalGuildPts($id)
    {
        return $this->eventStats()
            ->where('event_id', $id)
            ->sum('guild_pts');
    }

    public function countParticipants($id)
    {
        return $this->eventStats()
            ->where('event_id', $id)
            ->count();
    }

    /**
     * Define Relationships
     */
    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }

    public function eventStats()
    {
        return $this->hasManyThrough('App\Models\EventStat', 'App\Models\Member');
    }
}
