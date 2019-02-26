<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Table name
    protected $table = 'members';

    // Primary Key
    public $primaryKey = 'id';
   
    protected $fillable = [
        'name',
        'guild_id',
        'is_active'
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Define Relationships 
     */
    public function guild(){
        return $this->belongsTo('App\Models\Guild');
    }

    public function eventStats(){
        return $this->hasmany('App\Models\EventStat');
    }


}
