<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueFormRequest;
use App\Models\League;
use Illuminate\Http\Request;

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
    public function store(LeagueFormRequest $request, League $league)
    {
        $league->addLeague($request);
        $message = $request->name . ' added!';

        return redirect('/leagues')->with('success', $message);
    }

    /**
     * Display the specified resource.
     * ! Route disabled
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
    public function edit(League $league)
    {
        return view('pages.league.edit', compact('league'));
    }

    /**
     * Update League.
     *
     * @param  LeagueFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeagueFormRequest $request, League $league)
    {
        $league->edit($request);
        $message = $league->name . ' updated!';

        return redirect('/leagues')->with('success', $message);
    }

    /**
     * Remove League.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        $league->remove();
        $message = $league->name . ' removed!';

        return redirect('/leagues')->with('success', $message);
    }
}
