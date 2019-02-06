<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guild;
use App\Models\Member;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventStatController extends Controller
{
    public function member($member_id, $event_id)
    {
        try {
            $member = Member::findOrfail($member_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Member does not exist';
            return redirect('/')->with('error', $message);
        }

        try {
            $eventInfo = Event::findOrfail($event_id);
        } catch (ModelNotFoundException $e) {
            $message = 'Event does not exist';
            return redirect('/')->with('error', $message);
        }

        // Find a specific Member and return all Event Stats
        $memberStat = Member::find($member_id)->eventStats()
            ->where('event_id', $event_id)
            ->orderby('guild_pts', 'desc')
            ->get();

        // Calculate Total Guild Points
        $guildPtsTotal = Guild::find($member->guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->sum('guild_pts');

        $participants = Guild::find($member->guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->count();

        return view('pages.eventstats.member', compact('eventInfo', 'member', 'memberStat', 'guildPtsTotal', 'participants'));
    }
}
