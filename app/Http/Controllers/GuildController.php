<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use App\Models\Event;
use App\Models\EventStat;
use App\Models\EventType;
use App\Models\Member;
use App\Models\Guild;
use App\Http\Resources\Guilds as GuildsResource;

class GuildController extends Controller
{
    /**
     * Display all Guilds
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $guilds = Guild::all()->sortBy('name');
        return view('pages.guilds.index', compact('guilds'));
    }

    /**
     * Show the form for creating a new Guild.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guilds.create');
    }

    /**
     * Store a newly created Guild.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
 
        $guild = new Guild;
        $guild->name = $request->input('name');
        $guild->save();

        $message = $guild->name . ' added!';

        return redirect('/guild')->with('success', $message);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // THIS WILL SHOW ALL MEMBERS WITHIN THE SELECTED GUILD 

        // Get guild details
        $guild = Guild::findOrFail($id);

        // Get all members from the selected guild. 
        $members = Guild::find($id)->members->sortBy('name');

        // Get all events that guilds have participated in. 
        // May not need this 
        // $events = 

        return view('pages.guilds.show', compact('guild', 'members'));

        // NEED TO CATCH EXPECTIONS IF FAIL TO FIND GUILD.  
        // ESPECIALLY IF SOMEONE TYPES A RANDOM NUMBER IN THE BROWSER

    }

    /**
     * Show the form for editing the Guild.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guild = Guild::find($id);
        return view('pages.guilds.edit', compact('guild'));
    }

    /**
     * Update Guild.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $guild = Guild::find($id);
        $guild->name = $request->input('name');
        $guild->save();

        $message = $guild->name . ' updated!';

        return redirect('/guild')->with('success', $message);
    }
    /**
     * Remove Guild.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guild = Guild::find($id);
        $message = $guild->name . ' removed!';
        $guild->delete();
        
        return redirect('/guild')->with('success', $message);
    }
    /**
     * API - Display a listing of the resource.
     * Experimenting with API - on hold for now
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAPI() {
        // // Show all guilds
        // $guilds = Guild::all()->sortBy('name');
        // return view('pages.guilds.index', compact('guilds'));
        // // return $guilds; // Returns JSON

        // Show all guilds
        $guilds = Guild::all()->sortBy('name');

        // Return collection of all Guilds as a resource
        return GuildsResource::collection($guilds);

    }

}
