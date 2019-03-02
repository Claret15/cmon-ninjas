<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use App\Models\Guild;
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
        $events = Event::allEvents();
        $raid = $events->where('event_type_id', 1);
        $crusade = $events->where('event_type_id', 2);
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
    public function store(EventFormRequest $request, Event $event)
    {
        $event->addEvent($request);

        return redirect('/events')->with('success', 'Event created!');
    }

    /**
     * Show the Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // Not required
    }

    /**
     * Show the form to edit an Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('pages.events.edit', compact('event'));
    }

    /**
     * Update an Event.
     *
     * @param  EventFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventFormRequest $request, Event $event)
    {
        $event->edit($request);
        $message = $event->name . ' updated!';

        return redirect('/events')->with('success', $message);
    }

    /**
     * Remove Event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->remove();
        $message = $event->name . ' removed!';

        return redirect('/events')->with('success', $message);
    }
    /**
     * Show all Events
     *
     * @return \Illuminate\Http\Response
     */
    public function guild(Guild $guild)
    {
        $events = Event::allEvents();
        $raid = $events->where('event_type_id', 1);
        $crusade = $events->where('event_type_id', 2);
        $arena = $events->where('event_type_id', 3);
        // $guild = Guild::findorfail($guild_id);

        return view('pages.events.guild', compact('events', 'raid', 'crusade', 'arena', 'guild'));
    }
}
