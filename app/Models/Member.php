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
            'is_active' => $request->input('is_active')
        ];

        $this->create($attributes);
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
