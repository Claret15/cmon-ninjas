<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Guild;
use App\Models\EventStat;
use App\Models\Event;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();

        return view('pages.players.index')->with('players', $players);
       
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*  
        *   Get Player Details
        */

        // This works in terms of syntax, but I can't join guild_id to the guild.name
        // $player = Player::find($id);


        // This works, but I don't think I need to include guild name.  
        // Try to keep it simple.  
        $player = Player::where('players.id', $id)
            ->select('players.id', 'players.name as name', 'guilds.name as guild')
            ->join('guilds', 'players.guild_id', '=', 'guilds.id')
            // ->get();     // If you use ->get(), this returns a collection as an object.
                        // I would need to use $player[0]->
            ->first();      // This will return a single model - Exactly what I want.
                        // Then I can use $player->name, $player-guild.

        /*  
        *   Get Player Past Event Stats
        */

        // Obtains all stats for the Player - No table joins
        $pastEvents1 = EventStat::where('player_id', $id)->get();
        // $pastEvents1 = EventStat::find($id);

        // Obtains all stats for the Player plus table joins    
        $pastEvents2 = EventStat::where('player_id', $id)
            ->select('event_stats.*', 'events.name as event_name', 'players.id as playerID', 'players.name as name', 'leagues.name as league')
            ->join('players', 'event_stats.player_id', '=', 'players.id')
            ->join('events', 'event_stats.event_id', '=', 'events.id')
            ->join('leagues', 'event_stats.league_id', '=', 'leagues.id')
            ->orderby('events.event_date', 'desc')
            ->get();

        $totalSoloPts =  $pastEvents2;  // Update to test calculations

        /*  
        *   Testing Eloquent Relationship Queries
        */

        $allPlayerStats = Player::find($id)->eventStats;

        $allEventStats = Event::find(1)->eventStats;
        
        // This retrieves all guild stats
        // $allGuildEventStats = Guild::find(1)->eventStats;
        
        // This retrieves all guild stats and sorted by player Id - works
        // Only works by one sortBy condition
        // $allGuildEventStats = Guild::find(1)->eventStats->sortBy('event_id');

        // To order a collection with multiple conditions
        // Notice that () has been added to eventStats
        // The query can be used like a typical query builder. 
        // $allGuildEventStats = Guild::find(1)->eventStats()
        //     ->orderby('event_id', 'asec')
        //     ->orderby('guild_pts', 'desc')
        //     ->get();

        // You can then also filter the results using where. 
        // In this case, I am using where to filter to a specific event.  
        $allGuildEventStats = Guild::find(1)->eventStats()
        ->where('event_id', '2')
        ->orderby('guild_pts', 'desc')
        ->get();
            


        $playerGuild = Player::find($id)->guild;  // This works now.  
        
// Move these to the Guild Controller
        $testOutput = Guild::find($id);

        $members = Guild::find(3)->players;  // This works now

        // return view('pages.players.show')->with('player', $player);
        return view('pages.players.show', compact('player', 'pastEvents1', 'pastEvents2','members', 'playerGuild', 'testOutput','allPlayerStats','allEventStats','allGuildEventStats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
