<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORT MODELS TO PASS DATA TO THE VIEW
use App\Models\League;
use App\Models\EventType;
use App\Models\Player;
use App\Models\Guild;


class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function events(){
        return view('pages.events');
    }

    public function about() {
        return view('pages.about');
    }

    public function tests() {

        // $league = League::all();

        // Trying to test joins

        // Read this first https://laravel.com/docs/5.7/queries#joins

        $players = Player::where('guild_id', 1)
               ->orderBy('name', 'desc')
               ->get();

        return view('pages.tests.tests')->with('players', $players);

        
        // return Player::all();
        // return Guild::all();
        // return League::all();
        // return EventType::all();
        
    }
    
}
