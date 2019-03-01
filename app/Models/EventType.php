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

    public function addEventType($request)
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

    /**
     * Define Relationships
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }
}
