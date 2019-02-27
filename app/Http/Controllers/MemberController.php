<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberFormRequest;
use App\Models\Member;

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
     * @param Member $member
     * @return \Illuminate\Http\Response
     */
    public function store(MemberFormRequest $request, Member $member)
    {
        $member->addMember($request);

        return redirect('/guild/1')->with('success', 'Member created!');
    }

    /**
     * Display Member.
     *
     * @param  Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $memberStatsAll = $member->eventStats()
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        return view('pages.members.show', compact('member', 'memberStatsAll'));
    }

    /**
     * Ideas:
     * - Personal Best:
     *   - League and rank
     *   - Solo pts
     *   - Guild pts
     *   - Global Rank
     *
     * - Charts for league Participations
     *
     */

    /**
     * Show the form for editing the Member.
     *
     * @param  Member $member
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
    public function update(MemberFormRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect('/guild/' . $request->input('guild_id'))->with('success', 'Member Updated!');
    }

    /**
     * PERMANENTLY REMOVE MEMBER
     *
     * @param  Member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $guild = $member->guild->id;
        $message = $member->name . ' deleted!';
        $member->delete();

        return redirect('/guild/' . $guild)->with('success', $message);
    }
}
