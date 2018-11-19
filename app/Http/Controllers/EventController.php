<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guild;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Show all Events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Events
        $events = Event::all()->sortBy('event_date');

        // Raid Events
        $raid = $events->where('event_type_id', 1);

        // Crusade Events
        $crusade = $events->where('event_type_id', 2);

        // Arena Events
        $arena = $events->where('event_type_id', 3);

        return view('pages.events.index', compact('events', 'raid', 'crusade', 'arena'));
    }

    /**
     * Show the form for creating a new Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.events.create');
    }

    /**
     * Store a newly created Event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'event_type' => 'required',
            'event_date' => 'required',
        ]);

        // Create Event;    
        $event = new Event;
        $event->name = $request->input('name');
        $event->event_date = $request->input('event_date');
        $event->event_type_id = $request->input('event_type');
        $event->save();

        return redirect('/events')->with('success', 'Event created!');
    }

    /**
     * Show the Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('pages.events.show', compact('event'));
        // May not be required
    }

    /**
     * Show the form to edit an Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $eventType = $event->event_type_id;
    
        // Check if user is Admin
        // if(auth()->user()->id !== $post->user_id){
            // return redirect('/events')->with("error", 'Unauthorised action: edit event.');
        // } 

        return view('pages.events.edit', compact('event', 'eventType'));
    }

    /**
     * Update an Event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'event_type' => 'required',
            'event_date' => 'required',
        ]);

        // Update Event;    
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->event_date = $request->input('event_date');
        $event->event_type_id = $request->input('event_type');
        $event->save();

        $message = $event->name . ' updated!';

        return redirect('/events')->with('success', $message);
    }

    /**
     * Remove Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $message = $event->name . ' removed!';
        $event->delete();

        return redirect('/events')->with('success', $message);
    }

    public function guild($guild_id)
    {
        /**
         * Show all Events
         *
         * @return \Illuminate\Http\Response
         */

        // All Events
        $events = Event::all()->sortBy('event_date');

        // Raid Events
        $raid = $events->where('event_type_id', 1);

        // Crusade Events
        $crusade = $events->where('event_type_id', 2);

        $guild = Guild::findorfail($guild_id);

        return view('pages.events.guild', compact('events', 'raid', 'crusade', 'guild'));
    }

    public function guildShow($guild_id, $event_id)
    {

        // check if $guild_id or $event_id is valid.
        // If not, redirect to previous page and display a flash message.

        // Find a specific guild and return all member stats from a specific event
        $allGuildEventStats = Guild::find($guild_id)->eventStats()
            ->where('event_id', $event_id)
            ->orderby('guild_pts', 'desc')
            ->get();


        $eventInfo = Event::find($event_id);

        $guild = Guild::findorfail($guild_id);

        return view('pages.events.show', compact('allGuildEventStats', 'eventInfo', 'guild'));
    }

}
