<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStatFormRequest;
use App\Models\Event;
use App\Models\EventStat;
use App\Models\Guild;
use App\Models\League;
use App\Models\Member;
use Illuminate\Http\Request;

class EventStatController extends Controller
{
    /**
     * Show Member stats for a specific Event.
     *
     * @param  int  $member_id
     * @param  int  $event_id
     * @return View
     */
    public function member($member_id, $event_id)
    {
        $member = Member::findOrfail($member_id);
        $event = Event::with('eventType')->findOrfail($event_id);
        $guild = Guild::find($member->guild_id);
        $memberStat = $member->getEventStat($event_id);
        $guildPtsTotal = $guild->getTotalGuildPts($event_id);
        $participants = $guild->countParticipants($event_id);

        return view('pages.eventstats.member', compact('event', 'member', 'memberStat', 'guildPtsTotal', 'participants'));
    }

    /**
     * Show Guild stats for specific Event.
     *
     * @param  int  $guild_id
     * @param  int  $event_id
     * @return View
     */
    public function guild($guild_id, $event_id)
    {
        $guild = Guild::findOrfail($guild_id);
        $event = Event::with('eventType')->findOrfail($event_id);
        $members = $guild->members()->active()->get()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $leagues = League::orderBy('name', 'asc')->pluck('name', 'id');
        $allGuildEventStats = $guild->getEventStats($event_id);
        $guildPtsTotal = $guild->getTotalGuildPts($event_id);

        return view('pages.eventstats.guild', compact(
            'allGuildEventStats',
            'event',
            'guild',
            'guildPtsTotal',
            'members',
            'leagues'
        ));
    }

    /**
     * Create Event Stat
     *
     * @param  EventStatFormRequest  $request
     * @return RedirectResponse
     */
    public function store(EventStatFormRequest $request)
    {
        $message = 'Event Stat added!';
        EventStat::create($request->all());

        return back()->with('success', $message);
    }

    /**
     * Update Event Stat.
     *
     * @param  EventStatFormRequest $request
     * @return RedirectResponse
     */
    public function update(EventStatFormRequest $request)
    {
        $message = 'Event Stat Updated!';
        EventStat::findOrFail($request->id)->update($request->all());

        return back()->with('success', $message);
    }

    /**
     * Remove Event Stat.
     *
     * @param  \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        EventStat::find($request->eventStat)->delete();
        $message = 'Event stat removed!';

        return back()->with('success', $message);
    }
}
