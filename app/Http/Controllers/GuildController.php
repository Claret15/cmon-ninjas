<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuildFormRequest;
use App\Models\Guild;

class GuildController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display all Guilds
     *
     * @return View
     */
    public function index()
    {
        $guilds = Guild::allGuilds();
        return view('pages.guilds.index', compact('guilds'));
    }

    /**
     * Show the form for creating a new Guild.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.guilds.create');
    }

    /**
     * Create Guild
     *
     * @param  GuildFormRequest  $request
     * @param  Guild $guild
     * @return RedirectResponse
     */
    public function store(GuildFormRequest $request, Guild $guild)
    {
        $guild->addGuild($request);
        $message = $request->name . ' added!';

        return redirect('/guilds')->with('success', $message);
    }

    /**
     * Display all members in the Guild
     *
     * @param  Guild $guild
     * @return View
     */
    public function show(Guild $guild)
    {
        $members = $guild->members->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);

        return view('pages.guilds.show', compact('guild', 'members'));
    }

    /**
     * Show the form for editing the Guild.
     *
     * @param  Guild $guild
     * @return View
     */
    public function edit(Guild $guild)
    {
        return view('pages.guilds.edit', compact('guild'));
    }

    /**
     * Update Guild.
     *
     * @param  GuildFormRequest $request
     * @param  Guild $guild
     * @return RedirectResponse
     */
    public function update(GuildFormRequest $request, Guild $guild)
    {
        $guild->edit($request);
        $message = $request->name . ' updated!';

        return redirect('/guilds')->with('success', $message);
    }

    /**
     * Remove Guild.
     *
     * @param  Guild $guild
     * @return RedirectResponse
     */
    public function destroy(Guild $guild)
    {
        $guild->remove();
        $message = $guild->name . ' removed!';

        return redirect('/guilds')->with('success', $message);
    }
}
