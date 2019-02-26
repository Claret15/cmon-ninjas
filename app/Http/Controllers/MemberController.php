<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberFormRequest;
use App\Models\Guild;
use App\Models\Member;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Show members from all guilds
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('pages.members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a Member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.members.create');
    }

    /**
     * Store a newly created Member.
     *
     * @param  MemberFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberFormRequest $request)
    {
        $guild = Guild::where('name', $request->input('guild'))->first();

        Member::create([
            'name' => request('name'),
            'guild_id' => $guild->id,
            'is_active' => request('is_active')
        ]);

        return redirect('/guild/' . $guild->id)->with('success', 'Member created!');
    }

    /**
     * Display Member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $member = Member::findOrfail($id);
        } catch (ModelNotFoundException $e) {
            $message = 'Member does not exist';
            return redirect('/')->with('error', $message);
        }

        // This will return all EventStats ordered by event dates.
        $memberStatsAll = Member::find($id)->eventStats()
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        $memberStatsRaid = Member::find($id)->eventStats()
            ->where('event_type_id', '1')
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        $memberStatsCrusade = Member::find($id)->eventStats()
            ->where('event_type_id', '2')
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        $memberStatsArena = Member::find($id)->eventStats()
            ->where('event_type_id', '3')
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        return view('pages.members.show', compact('member', 'memberStatsAll', 'memberStatsRaid', 'memberStatsCrusade', 'memberStatsArena'));

        /**
         * Add the following:
         * - Personal Best:
         *   - League and rank
         *   - Solo pts
         *   - Guild pts
         *   - Global Rank
         *
         * - Charts for league Participations
         *
         * - Show promoted or relegated?
         *
         * Try to calculate following:
         * - Overall total pts
         *
         * Tables:
         * - Ability to order the columns?
         * -
         */
    }

    /**
     * Show the form for editing the Member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('pages.members.edit', compact('member'));
    }

    /**
     * Update Member.
     *
     * @param  MemberFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberFormRequest $request, $id)
    {
        $guild = Guild::where('name', $request->input('guild'))->first();

        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->guild_id = $guild->id;
        $member->is_active = $request->input('is_active');
        $member->save();

        return redirect('/guild/' . $guild->id)->with('success', 'Member Updated!');
    }

    /**
     * PERMANENTLY REMOVE MEMBER.
     * WARNING! THIS CANNOT BE UNDONE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $guild = $member->guild->id;
        $message = $member->name . ' deleted!';
        $member->delete();

        return redirect('/guild/' . $guild)->with('success', $message);
    }
}
