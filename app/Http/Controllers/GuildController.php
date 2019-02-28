<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests\GuildFormRequest;
use App\Http\Resources\Guilds as GuildsResource;
use App\Models\Guild;
use App\Models\Member;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guilds = Guild::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
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
     * @param  GuildFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuildFormRequest $request)
    {
        $guild = new Guild;
        $guild->name = $request->input('name');
        $guild->save();

        $message = $guild->name . ' added!';

        return redirect('/guild')->with('success', $message);
    }

    /**
     * Display all members in the Guild
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::connection()->enableQueryLog();

        try {
            $guild = Guild::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $message = 'Guild does not exist';
            return redirect('/')->with('error', $message);
        }

        $members = Guild::find($id)->members->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
        $log = DB::getQueryLog();
        print_r($log);
        return view('pages.guilds.show', compact('guild', 'members'));

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
     * @param  GuildFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuildFormRequest $request, $id)
    {
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
}
