<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'guild_id',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function addMember($request)
    {
        $guild = Guild::where('name', $request->input('guild'))->first();

        $attributes = [
            'name' => $request->input('name'),
            'guild_id' => $guild->id,
            'is_active' => $request->input('is_active'),
        ];

        $this->create($attributes);
    }

    public function edit($request)
    {
        $this->update($request->all());
    }

    public function remove()
    {
        $this->delete();
    }

    public function getAllEventStats()
    {
        return $this->eventStats()
            ->with('league', 'event')
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();
    }

    public function getEventStat($id)
    {
        return $this->eventStats()
            ->with('league', 'event')
            ->where('event_id', $id)
            ->get();
    }

    /**
     * Define Relationships
     */
    public function guild()
    {
        return $this->belongsTo('App\Models\Guild');
    }

    public function eventStats()
    {
        return $this->hasmany('App\Models\EventStat');
    }
}
