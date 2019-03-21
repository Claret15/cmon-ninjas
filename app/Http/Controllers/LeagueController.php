<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueFormRequest;
use App\Models\League;
use Illuminate\Support\Facades\Cache;

class LeagueController extends Controller
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
     * Display all Leagues.
     *
     * @return View
     */
    public function index()
    {
        $leagues = Cache::remember('leagues', 60, function () {
            return League::all();
        });
        // $leagues = League::all();

        return view('pages.league.index', compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.league.create');
    }

    /**
     * Store a newly created League.
     *
     * @param  LeagueFormRequest $request
     * @param  League $league
     * @return RedirectResponse
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
    // public function show($id)
    // {
        //
    // }

    /**
     * Show the form for editing the League.
     *
     * @param  League $league
     * @return View
     */
    public function edit(League $league)
    {
        return view('pages.league.edit', compact('league'));
    }

    /**
     * Update League.
     *
     * @param  LeagueFormRequest $request
     * @param  League $league
     * @return RedirectResponse
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
     * @param  League $league
     * @return RedirectResponse
     */
    public function destroy(League $league)
    {
        $league->remove();
        $message = $league->name . ' removed!';

        return redirect('/leagues')->with('success', $message);
    }
}
