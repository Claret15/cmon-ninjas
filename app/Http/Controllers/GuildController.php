<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use App\Models\EventType;
use App\Models\Member;
use App\Models\Guild;

class GuildController extends Controller
{
    // public function index() {

    // THIS MAY BE USED AS IT RETURNS ALL MEMBERS FROM A SPECIFIC GUILD. 

    //     // $league = League::all();

    //     $members = Member::where('guild_id', 1)
    //            ->orderBy('name', 'desc')
    //            ->get();

    //     return view('pages.guilds.index')->with('members', $members);
        
    // }

        public function index() {

// THIS MAY BE USED INSTEAD OF THE ABOVE FUNCTION
// THIS QUERY RETURNS MORE INFORMATION 


    // Trying to show the guild and league names instead of their respective ids as per foreign keys
        $members = Member::where('guild_id', 1)
                // ->select('members.name', 'guilds.name as guild', 'leagues.name as league')
                ->select('members.name', 'members.id', 'guilds.name as guild')
                // Using join 
                // - first argument is the name of the table you want to join
                // - remaining arguments specify the column restraints for the join. 
                ->join('guilds', 'members.guild_id', '=', 'guilds.id')
                // ->join('leagues', 'members.league_id', '=', 'leagues.id')
                // ->orderBy('name', 'asc')
                ->get();

        // return view('pages.guilds.index')->with('members', $members);


    // USE MEMBERS AS THIS IS CLEANER AND SIMPLER.  
        $members = Guild::find(1)->members;  // This works now
        return view('pages.guilds.index', compact('members'));

        
    }
}


/*
*************************************************************************
NOTES

// Returns all rows from Leagues table
    // $league = League::all();

// Returns all members from the Members table
// This displays all the column names
    // $members = Member::all();

// Returns all players from the Members table
// This displays only the name and league_id columns
    // $members = Member::select('name', 'league_id')->get();

// This obtains all members in a specific guild
// This works            
    // $members = member::where('guild_id', 1)
    // ->orderBy('name', 'desc')
    // ->get();

// return Member::all();
// return Guild::all();
// return League::all();
// return EventType::all();


*/