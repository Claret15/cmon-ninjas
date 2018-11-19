<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Guild;
use App\Models\EventStat;
use App\Models\Event;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /**
         * Shall members from all guilds
         */
        $members = Member::all();

        return view('pages.members.index')->with('members', $members);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Add member 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // Member details
        $member = Member::find($id); // Keep

        // This will return all EventStats ordered by event dates. 
        // Join is required to retrieve the correct columns. 
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

        return view('pages.members.show', compact('member','memberStatsAll','memberStatsRaid','memberStatsCrusade', 'memberStatsArena'));

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Show Edit member page
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update member details
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete member - Won't need this.  
        // Will need to change is_active to false
        // This way member is still intact and eventstats will be displayed. 
    }
}
