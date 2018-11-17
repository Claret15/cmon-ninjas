<?php

use App\Models\Guild;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Resources\Guild as GuildResource;
use App\Http\Resources\GuildCollection;
use App\Http\Resources\Member as MemberResource;
use App\Http\Resources\MemberCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 *  GUILD ROUTES
 */

// Show Guilds
Route::get('/guilds', function(){
    return new GuildCollection(Guild::all());
});

// Show Guild
Route::get('/guild/{id}', function($id){
    return new GuildResource(Guild::find($id));
});



/**
 *  MEMBER ROUTES
 */

// Show Members
Route::get('/members', function(){
    return new MemberCollection(Member::all());
});

// Show Member
Route::get('/member/{id}', function($id){
    return new MemberResource(Member::find($id));
});



/**
 *  Fallback Route
 */
Route::fallback(function () {
    return response()->json(['route' => 'Not valid!'], 404);
});



// Show all guilds (A-Z) - Using Controller
// Route::get('/guilds', 'GuildController@indexAPI');
