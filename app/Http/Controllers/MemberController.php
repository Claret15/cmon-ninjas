<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberFormRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Cache;

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
     * ! Route disabled
     *
     * @return View
     */
    public function index()
    {
        $members = Member::all();
        return view('pages.members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a Member.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.members.create');
    }

    /**
     * Create Member
     *
     * @param  MemberFormRequest $request
     * @param Member $member
     * @return RedirectReponse
     */
    public function store(MemberFormRequest $request, Member $member)
    {
        $member->addMember($request);

        return redirect('/guilds/1')->with('success', 'Member created!');
    }

    /**
     * Display Member.
     *
     * @param  Member $member
     * @return View
     */
    public function show(Member $member)
    {

        $memberStatsAll = Cache::remember('memberStatsAll_' . $member->id, 60, function () use ($member) {
            return $member->getAllEventStats();
        });

        // $memberStatsAll = $member->getAllEventStats();

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
     * @return View
     */
    public function edit(Member $member)
    {
        return view('pages.members.edit', compact('member'));
    }

    /**
     * Update Member.
     *
     * @param  MemberFormRequest $request
     * @param  Member  $member
     * @return RedirectResponse
     */
    public function update(MemberFormRequest $request, Member $member)
    {
        $member->edit($request);

        return redirect('/guilds/' . $request->input('guild_id'))->with('success', 'Member Updated!');
    }

    /**
     * PERMANENTLY REMOVE MEMBER
     *
     * @param  Member $member
     * @return RedirectResponse
     */
    public function destroy(Member $member)
    {
        $member->remove();
        $message = $member->name . ' deleted!';

        return redirect('/guilds/' . $member->guild_id)->with('success', $message);
    }
}
