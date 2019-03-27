<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStatFormRequest;
use App\Models\Event;
use App\Models\EventStat;
use App\Models\Guild;
use App\Models\League;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $member = Cache::remember('member_' . $member_id, 10, function () use ($member_id) {
            return Member::findOrfail($member_id);
        });

        $event = Cache::remember('event_' . $event_id, 10, function () use ($event_id) {
            return Event::with('eventType')->findOrfail($event_id);
        });

        $guild = Cache::remember('guild_' . $member->guild_id, 10, function () use ($member) {
            return Guild::find($member->guild_id);
        });

        $memberStat = Cache::remember('member_stats_' . $event_id . '_' . $member_id, 10, function () use ($member, $event_id) {
            return $member->getEventStat($event_id);
        });

        $guildPtsTotal = Cache::remember('total_guild_pts_' . $event_id, 10, function () use ($guild, $event_id) {
            return $guild->getTotalGuildPts($event_id);
        });

        $participants = Cache::remember('participants_' . $event_id, 10, function () use ($guild, $event_id) {
            return $guild->countParticipants($event_id);
        });

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
        $guild = Cache::remember('guild_' . $guild_id, 10, function () use ($guild_id) {
            return Guild::find($guild_id);
        });

        $event = Cache::remember('event_' . $event_id, 10, function () use ($event_id) {
            return Event::with('eventType')->findOrfail($event_id);
        });

        $members = Cache::remember('guild_members_pluck_' . $guild_id, 10, function () use ($guild) {
            return $guild->members()->active()->get()
                ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        });

        $leagues = Cache::remember('leagues_pluck' . $guild_id, 10, function () {
            return League::orderBy('name', 'asc')->pluck('name', 'id');
        });
        
        $allGuildEventStats = Cache::remember(
            'guild_' . $guild_id . '_stats_' . $event_id,
            60,
            function () use ($guild, $event_id) {
                return $guild->getEventStats($event_id);
            }
        );

        $guildPtsTotal = Cache::remember('total_guild_pts_' . $event_id, 10, function () use ($guild, $event_id) {
            return $guild->getTotalGuildPts($event_id);
        });

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
