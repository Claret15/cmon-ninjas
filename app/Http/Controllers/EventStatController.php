<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Guild;
use App\Models\EventStat;
use App\Models\Event;

class EventStatController extends Controller
{

    public function guild($guild_id, $event_id)
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
        return view('pages.eventstats.guild', compact('allGuildEventStats', 'allGuildEventStatsPaginate', 'eventInfo', 'guild'));
    }    


}
