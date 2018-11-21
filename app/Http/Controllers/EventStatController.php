<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Guild;
use App\Models\EventStat;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;  // Needed to catch error

class EventStatController extends Controller
{
    /**
     * Show Guild stats for specific Event. 
     *
     * @return \Illuminate\Http\Response
     */
    public function guild($guild_id, $event_id)
    {

        // check if $guild_id or $event_id is valid. 
        // If not, redirect to previous page and display a flash message.

        try{
            $guild = Guild::findOrfail($guild_id);
        } catch(ModelNotFoundException $e) {
            return redirect('/');       // May replace this with a message and remain on page. 
                                        // Uses Sessions 
        }

        // Find a specific guild and return all member stats from a specific event
        $allGuildEventStats = Guild::find($guild_id)->eventStats()
        ->where('event_id', $event_id)
        ->orderby('guild_pts', 'desc')
        ->get();

        $eventInfo = Event::find($event_id);

        // Calculate Total Guild Points
        $guildPtsTotal = Guild::find($guild_id)->eventStats()
        ->where('event_id', $event_id)
        ->sum('guild_pts');
            
        return view('pages.eventstats.guild', compact('allGuildEventStats', 'eventInfo', 'guild', 'guildPtsTotal'));
    }    

    public function member($member_id,$event_id)
    {
        // Find a specific Member and return all Event Stats
        $member = Member::find($member_id);
        $memberStat = Member::find($member_id)->eventStats()
        ->where('event_id', $event_id)
        ->orderby('guild_pts', 'desc')
        ->get();

        $eventInfo = Event::find($event_id);

        $guild = Guild::findorfail($member->guild_id);

        return view('pages.eventstats.member', compact('eventInfo', 'guild', 'memberStat'));
    }    

}
