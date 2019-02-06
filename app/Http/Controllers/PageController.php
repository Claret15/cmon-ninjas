<?php

namespace App\Http\Controllers;

use App\Models\Member;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function events()
    {
        return view('pages.events');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function tests()
    {

        $data = array(
            "event_id" => 1,
            "member_id" => "King Minotaur",
            "guild_pts" => 227609185950,
            "position" => 1,
            "league_id" => "Legends",
            "solo_rank" => 18,
            "global_rank" => 108,
        );

        $members = Member::where('guild_id', 1)
            ->orderBy('name', 'desc')
            ->get();

        return view('pages.tests.tests', compact('members', 'data'));

    }

}
