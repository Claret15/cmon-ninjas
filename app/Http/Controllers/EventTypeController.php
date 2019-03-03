<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTypeFormRequest;
use App\Models\EventType;

class EventTypeController extends Controller
{
    /**
     * Display all Event Types
     *
     * @return View
     */
    public function index()
    {
        $eventTypes = EventType::all();
        return view('pages.eventtype.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new Event Type.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.eventtype.create');
    }

    /**
     * Create Event Type.
     *
     * @param  EventTypeFormRequest $request
     * @param  EventType $eventType
     * @return RedirectResponse
     */
    public function store(EventTypeFormRequest $request, EventType $eventType)
    {
        $eventType->addEventType($request);
        $message = $request->name . ' added!';

        return redirect('/event_types')->with('success', $message);
    }

    /**
     * Display the specified resource.
     * ! Route Disabled
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not required
    }

    /**
     * Show the form for editing the Event Type.
     *
     * @param  EventType $eventType
     * @return View
     */
    public function edit(EventType $eventType)
    {
        return view('pages.eventtype.edit', compact('eventType'));
    }

    /**
     * Update Event Type.
     *
     * @param  EventTypeFormRequest $request
     * @param  EventType $eventType
     * @return RedirectResponse
     */
    public function update(EventTypeFormRequest $request, EventType $eventType)
    {
        $eventType->edit($request);
        $message = $eventType->name . ' updated!';

        return redirect('/event_types')->with('success', $message);
    }

    /**
     * Remove Event Type.
     *
     * @param  EventType $eventType
     * @return RedirectResponse
     */
    public function destroy(EventType $eventType)
    {
        $eventType->remove();
        $message = $eventType->name . ' removed!';

        return redirect('/event_types')->with('success', $message);
    }
}
