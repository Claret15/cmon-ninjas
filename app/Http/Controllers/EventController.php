<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use App\Models\Guild;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'guild']]);
    }

    /**
     * Show all Events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Events
        $events = Event::all()->sortByDesc('event_date');

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
     * @param  EventFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventFormRequest $request)
    {
        $event = new Event;
        $event->name = $request->input('event_name');
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
        try {
            $event = Event::findOrfail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('/events')->with('error', 'Invalid Event');
        }

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
     * @param  EventFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventFormRequest $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->input('event_name');
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
    /**
     * Show all Events
     *
     * @return \Illuminate\Http\Response
     */
    public function guild($guild_id)
    {
        // All Events
        $events = Event::all()->sortByDesc('event_date');

        // Raid Events
        $raid = $events->where('event_type_id', 1);

        // Crusade Events
        $crusade = $events->where('event_type_id', 2);

        // Arena Events
        $arena = $events->where('event_type_id', 3);

        $guild = Guild::findorfail($guild_id);

        return view('pages.events.guild', compact('events', 'raid', 'crusade', 'arena', 'guild'));

        // NB: In this view, when you click on the listed event name,
        // this is being handled by GuildStatController.
    }

}
