<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeagueFormRequest;
use App\Models\League;

class LeagueController extends Controller
{
    /**
     * Display all Leagues.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::all();

        return view('pages.league.index', compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.league.create');
    }

    /**
     * Store a newly created League.
     *
     * @param  LeagueFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeagueFormRequest $request)
    {
        $league = new League;
        $league->name = $request->input('name');
        $league->save();

        $message = $league->name . ' added!';

        return redirect('/leagues')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the League.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $league = League::find($id);
        return view('pages.league.edit', compact('league'));
    }

    /**
     * Update League.
     *
     * @param  LeagueFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeagueFormRequest $request, $id)
    {
        $league = League::find($id);
        $league->name = $request->name;
        $league->save();

        $message = $league->name . ' updated!';

        return redirect('/leagues')->with('success', $message);
    }

    /**
     * Remove League.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league = League::find($id);
        $message = $league->name . ' removed!';
        $league->delete();
        return redirect('/leagues')->with('success', $message);
    }
}
