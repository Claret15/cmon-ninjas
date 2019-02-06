<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index');
// Route::get('/tests', 'PageController@tests');

Route::get('/guild/{id}/events/', 'EventController@guild');
Route::get('/member/{member_id}/event/{event_id}', 'EventStatController@member');

Route::get('/guild/{guild_id}/event/{event_id}', 'GuildStatController@show');
Route::post('/guild/{guild_id}/event/{event_id}', 'GuildStatController@store');
Route::put('/guild/{guild_id}/event/{event_id}', 'GuildStatController@update');
Route::delete('/guild/{guild_id}/event/{event_id}', 'GuildStatController@destroy');

Route::resource('guild', 'GuildController');
Route::resource('event_type', 'EventTypeController')->except(['show']);
Route::resource('events', 'EventController')->except(['show']);
Route::resource('leagues', 'LeagueController')->except(['show']);
Route::resource('members', 'MemberController')->except(['index']);

// Import Files
Route::post('/import_crusade', 'ImportController@importEventStatsCrusade');
Route::post('/import_raid', 'ImportController@importEventStatsRaid');
Route::post('/import_members', 'ImportController@importMembers');

Route::fallback(function () {
    return redirect('/')->with('error', 'Page does not exist');
});

Auth::routes(['register' => false]);

Route::get('/dashboard', 'DashboardController@index');


