<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use App\Models\EventType;
use App\Models\Player;
use App\Models\Guild;

class GuildController extends Controller
{
    // public function index() {

    // THIS MAY BE USED AS IT RETURNS ALL PLAYERS FROM A SPECIFIC GUILD. 

    //     // $league = League::all();

    //     $players = Player::where('guild_id', 1)
    //            ->orderBy('name', 'desc')
    //            ->get();

    //     return view('pages.guilds.index')->with('players', $players);
        
    // }

        public function index() {

// THIS MAY BE USED INSTEAD OF THE ABOVE FUNCTION
// THIS QUERY RETURNS MORE INFORMATION 


    // Trying to show the guild and league names instead of their respective ids as per foreign keys
        $players = Player::where('guild_id', 1)
                // ->select('players.name', 'guilds.name as guild', 'leagues.name as league')
                ->select('players.name', 'players.id', 'guilds.name as guild')
                // Using join 
                // - first argument is the name of the table you want to join
                // - remaining arguments specify the column restraints for the join. 
                ->join('guilds', 'players.guild_id', '=', 'guilds.id')
                // ->join('leagues', 'players.league_id', '=', 'leagues.id')
                // ->orderBy('name', 'asc')
                ->get();

        // return view('pages.guilds.index')->with('players', $players);


    // USE MEMBERS AS THIS IS CLEANER AND SIMPLER.  
        $members = Guild::find(1)->players;  // This works now
        return view('pages.guilds.index', compact('members','players'));

        
    }
}


/*
*************************************************************************
NOTES

// Returns all rows from Leagues table
    // $league = League::all();

// Returns all players from the Players table
// This displays all the column names
    // $players = Player::all();

// Returns all players from the Players table
// This displays only the name and league_id columns
    // $players = Player::select('name', 'league_id')->get();

// This obtains all players in a specific guild
// This works            
    // $players = Player::where('guild_id', 1)
    // ->orderBy('name', 'desc')
    // ->get();

// return Player::all();
// return Guild::all();
// return League::all();
// return EventType::all();


*/