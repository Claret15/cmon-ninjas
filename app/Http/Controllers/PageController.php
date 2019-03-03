<?php

namespace App\Http\Controllers;

use App\Models\Member;

class PageController extends Controller
{
    /**
     * Show the Homepage
     *
     * @return View
     */
    public function index()
    {
        return view('pages.index');
    }
}
