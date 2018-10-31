<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\League;
use App\Models\EventType;
use App\Models\Member;
use App\Models\Guild;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        // All events
        $events = Event::all()->sortBy('event_date');

        // Raid events
        $raid = $events->where('event_type_id', 1);

        // Crusade events
        $crusade = $events->where('event_type_id', 2);

        return view('pages.events.index', compact('events', 'raid', 'crusade'));
    }

    public function guild($guild_id)
    {    
        // All events
        $events = Event::all()->sortBy('event_date');

        // Raid events
        $raid = $events->where('event_type_id', 1);

        // Crusade events
        $crusade = $events->where('event_type_id', 2);

        $guild = Guild::findorfail($guild_id);        

        return view('pages.events.guild', compact('events', 'raid', 'crusade', 'guild'));
    }
    
    
    public function guildShow($guild_id, $event_id)
    {

        // check if $guild_id or $event_id is valid.
        // If not, redirect to previous page and display a flash message. 


        // Find a specific guild and return all member stats from a specific event
        $allGuildEventStats = Guild::find($guild_id)->eventStats()
        ->where('event_id', $event_id)
        ->orderby('guild_pts', 'desc')
        ->get();

        // Using pagination
        $allGuildEventStatsPaginate = Guild::find($guild_id)->eventStats()
        ->where('event_id', $event_id)
        ->orderby('guild_pts', 'desc')
        ->paginate(10);

        $eventInfo = Event::find($event_id);

        $guild = Guild::findorfail($guild_id);

            
        // return view('pages.members.show')->with('member', $member);
        return view('pages.events.show', compact('allGuildEventStats', 'allGuildEventStatsPaginate', 'eventInfo', 'guild'));
    }    
}
