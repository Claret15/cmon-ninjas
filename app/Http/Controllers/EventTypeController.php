<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EventType;


class EventTypeController extends Controller
{
    /**
     * Display all Event Types
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTypes = EventType::all();

        return view('pages.eventtype.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new Event Type.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.eventtype.create');
    }

    /**
     * Store a newly created Event Type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // Create Event Type;    
        $eventType = new EventType;
        $eventType->name = $request->input('name');
        $eventType->save();

        $message = $eventType->name . ' added!';

        return redirect('/event_type')->with('success', $message);
    }

    /**
     * Display the specified resource.
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventType = EventType::find($id);
        return view('pages.eventtype.edit', compact('eventType'));
    }

    /**
     * Update Event Type.
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

        // Update Event Type;    
        $eventType = EventType::find($id);
        $eventType->name = $request->input('name');
        $eventType->save();

        $message = $eventType->name . ' updated!';

        return redirect('/event_type')->with('success', $message);
    }

    /**
     * Remove Event Type.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventType = EventType::find($id);
        $message = $eventType . ' removed!';
        $eventType->delete();
        return redirect('/event_type')->with('success', $message);
    }
}
