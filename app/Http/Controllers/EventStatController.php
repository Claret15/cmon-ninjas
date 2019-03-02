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
        $member = Member::findOrfail($member_id);
        $event = Event::findOrfail($event_id);
        $guild = Guild::find($member->guild_id);
        $memberStat = $member->getEventStat($event_id);
        $guildPtsTotal = $guild->getTotalGuildPts($event_id);
        $participants = $guild->countParticipants($event_id);

        return view('pages.eventstats.member', compact('event', 'member', 'memberStat', 'guildPtsTotal', 'participants'));
    }
}
