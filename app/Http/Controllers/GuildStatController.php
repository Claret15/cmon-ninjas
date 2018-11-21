<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventStat;
use App\Models\Guild;
use App\Models\League;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GuildStatController extends Controller
{

    /**
     * Show the form for creating Guild Event Stats.
     * @param  int  $guild_id
     * @param  int  $event_id
     * @return \Illuminate\Http\Response
     */
    public function create($guild_id, $event_id)
    {
        // May not need this route.  
        // Relevant buttons will be shown if logged in as Admin on the show route. 

        try {
            $guild = Guild::findOrfail($guild_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Guild does not exist';
            return redirect('/')->with('error', $message);
        }

        try {
            $eventInfo = Event::findOrfail($event_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Event does not exist';
            return redirect('/')->with('error', $message);
        }

        // Get all ACTIVE Guild members.
        $members = Guild::find($guild_id)->members
            ->where('is_active', true)
            ->sortBy('name')
            ->pluck('name', 'id');

        // Get all league types
        $leagues = League::pluck('name', 'id');

        // Find a specific guild and return all member stats from a specific event
        $allGuildEventStats = Guild::find($guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->orderby('guild_pts', 'desc')
            ->get();

        // Calculate Total Guild Points
        $guildPtsTotal = Guild::find($guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->sum('guild_pts');

        return view('pages.eventstats.guildcreate', compact('allGuildEventStats', 'eventInfo', 'guild', 'guildPtsTotal', 'members', 'leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'guild_id' => 'required',
            'event_id' => 'required',
            'member_id' => 'required',
            'guild_pts' => 'required',
            'position' => 'required',
            'solo_pts' => 'required',
            'league_id' => 'required',
            'solo_rank' => 'required',
            'global_rank' => 'required',
        ]);

        // Need to check if a member has an event stat with event_id
        // If so, redirect and show a message that a records already exists.  
        // Otherwise, continue. 

        $guildId = $request->input('guild_id');
        $eventId = $request->input('event_id');

        // try {
        //     $checkStats = EventStat::findOrfail($guild_id);
        // } catch (ModelNotFoundException $e) {
        //     return redirect('/'); // May replace this with a message and remain on page.
        //     // Uses Sessions
        // }

        $eventStat = new EventStat;
        $eventStat->event_id = $eventId;
        $eventStat->member_id = $request->member_id;
        $eventStat->guild_pts = $request->input('guild_pts');
        $eventStat->position = $request->input('position');
        $eventStat->solo_pts = $request->input('solo_pts');
        $eventStat->league_id = $request->input('league_id');
        $eventStat->solo_rank = $request->input('solo_rank');
        $eventStat->global_rank = $request->input('global_rank');
        $eventStat->save();

        $message = 'Event Stat added!';
        
        return redirect()->action(
            'GuildStatController@create', ['$guild_id' => $guildId, '$event_id' => $eventId]
        )->with('success', $message);
    }

    /**
     * Show Guild stats for specific Event.
     *
     * @param  int  $guild_id
     * @param  int  $event_id
     * @return \Illuminate\Http\Response
     */
    public function show($guild_id, $event_id)
    {
        // check if $guild_id or $event_id is valid.
        // If not, redirect and display a flash message.

        try {
            $guild = Guild::findOrfail($guild_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Guild does not exist';
            return redirect('/')->with('error', $message);
        }

        try {
            $eventInfo = Event::findOrfail($event_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Event does not exist';
            return redirect('/')->with('error', $message);
        }

        // Get all ACTIVE Guild members.
        $members = Guild::find($guild_id)->members
            ->where('is_active', true)
            ->sortBy('name')
            ->pluck('name', 'id');

        // Get all league types
        $leagues = League::pluck('name', 'id');

        // Find a specific guild and return all member stats from a specific event
        $allGuildEventStats = Guild::find($guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->orderby('guild_pts', 'desc')
            ->get();

        // Calculate Total Guild Points
        $guildPtsTotal = Guild::find($guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->sum('guild_pts');

        return view('pages.eventstats.guildcreate', compact('allGuildEventStats', 'eventInfo', 'guild', 'guildPtsTotal', 'members', 'leagues'));
    }


    /**
     * Update Event Stat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'eventStat' => 'required',
            'guild_id' => 'required',
            'event_id' => 'required',
            'member_id' => 'required',
            'guild_pts' => 'required',
            'position' => 'required',
            'solo_pts' => 'required',
            'league_id' => 'required',
            'solo_rank' => 'required',
            'global_rank' => 'required',
        ]); 
 
        $guildId = $request->input('guild_id');
        $eventId = $request->input('event_id');
        $eventStatId = $request->input('eventStat');
        
        $eventStat = EventStat::find($eventStatId);
        $eventStat->event_id = $eventId;
        $eventStat->member_id = $request->member_id;
        $eventStat->guild_pts = $request->input('guild_pts');
        $eventStat->position = $request->input('position');
        $eventStat->solo_pts = $request->input('solo_pts');
        $eventStat->league_id = $request->input('league_id');
        $eventStat->solo_rank = $request->input('solo_rank');
        $eventStat->global_rank = $request->input('global_rank');
        $eventStat->save();

        $message = 'Event Stat Updated!';
        
        return redirect()->action(
            'GuildStatController@create', ['$guild_id' => $guildId, '$event_id' => $eventId]
        )->with('success', $message);
    }

    /**
     * Remove Event Stat.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $request->validate([
            'eventStat' => 'required',
            'guild_id' => 'required',
            'event_id' => 'required',
        ]); 
        
        $guildId = $request->input('guild_id');
        $eventId = $request->input('event_id');
        $eventStatId = $request->input('eventStat');

        $eventStat = EventStat::find($eventStatId);
        $message = 'Event stat removed!';
        $eventStat->delete();

        return redirect()->action(
            'GuildStatController@create', ['$guild_id' => $guildId, '$event_id' => $eventId]
        )->with('success', $message);
    }
}
