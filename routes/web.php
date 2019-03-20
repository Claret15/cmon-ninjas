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
Auth::routes(['register' => false]);

Route::get('/', 'PageController@index');
Route::resource('guilds', 'GuildController');
Route::resource('event_types', 'EventTypeController')->except(['show']);
Route::resource('leagues', 'LeagueController')->except(['show']);
Route::resource('members', 'MemberController');

Route::resource('events', 'EventController')->except(['show']);
Route::get('/guilds/{id}/events/', 'EventController@guild');

Route::get('/member/{member_id}/event/{event_id}', 'EventStatController@member');
Route::get('/guilds/{guild_id}/event/{event_id}', 'EventStatController@guild');
Route::post('/guilds/{guild_id}/event/{event_id}', 'EventStatController@store');
Route::put('/guilds/{guild_id}/event/{event_id}', 'EventStatController@update');
Route::delete('/guilds/{guild_id}/event/{event_id}', 'EventStatController@destroy');


// Import Files
Route::post('/import_crusade', 'ImportController@importEventStatsCrusade');
Route::post('/import_raid', 'ImportController@importEventStatsRaid');
Route::post('/import_members', 'ImportController@importMembers');

Route::get('/dashboard', 'DashboardController@index');

Route::fallback(function () {
    return redirect('/')->with('error', 'Page does not exist');
});
