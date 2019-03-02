<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [
        'event_date',
    ];

    protected $fillable = [
        'name',
        'event_date',
        'event_type_id',
    ];

    /**
     * Remove default timestamps from model
     * @var array
     */
    public $timestamps = false;

    public function addEvent($request)
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
     * Scope a query to return all events in descending order
     * Eager Load EventType
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllEvents($query)
    {
        return $query->with('eventType')
            ->orderBy('event_date', 'desc')
            ->get();
    }

    // Define Relationships
    public function eventType()
    {
        return $this->belongsTo('App\Models\EventType');
    }

    public function eventStats()
    {
        return $this->hasMany('App\Models\EventStat');
    }
}
