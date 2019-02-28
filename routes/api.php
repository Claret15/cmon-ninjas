<?php

use App\Http\Resources\Event as EventResource;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventType as EventTypeResource;
use App\Http\Resources\Guild as GuildResource;
use App\Http\Resources\GuildCollection;
use App\Http\Resources\GuildMembers;
use App\Http\Resources\League as LeagueResource;
use App\Http\Resources\Member as MemberResource;
use App\Http\Resources\MemberCollection;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Guild;
use App\Models\League;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Resources\GuildEventStats;
use App\Http\Resources\MemberEventStats;
use App\Http\Resources\MemberEvents;

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

Route::get('/guilds', function () {
    return new GuildCollection(Guild::all());
});

Route::get('/guilds/{id}', function ($id) {
    return new GuildResource(Guild::find($id));
});

Route::get('/guilds/{id}/members', function ($id) {
    return GuildMembers::collection(Guild::find($id)->members
            ->where('is_active', true)
            ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE));
});

Route::get('/guilds/{guild_id}/events/{event_id}', function ($guild_id, $event_id) {

    return GuildEventStats::collection(Guild::find($guild_id)->eventStats
            ->where('event_id', $event_id)
            ->sortByDesc('guild_pts'));
});

/**
 *  MEMBER ROUTES
 */
Route::get('/members', function () {
    return new MemberCollection(Member::all());
});

Route::get('/members/{id}', function ($id) {
    return new MemberResource(Member::find($id));
});

Route::get('/members/{member_id}/events', function ($member_id) {
    return MemberEvents::collection(Member::find($member_id)->eventStats()
    ->join('events', 'event_stats.event_id', '=', 'events.id')
    ->orderby('event_date', 'desc')
    ->get());
});

Route::get('/members/{member_id}/events/{event_id}', function ($member_id, $event_id) {
    return MemberEventStats::collection(Member::find($member_id)->eventStats()
    ->where('event_id', $event_id)
    ->join('events', 'event_stats.event_id', '=', 'events.id')
    ->orderby('event_date', 'desc')
    ->get());
});

/**
 *  LEAGUE ROUTES
 */

Route::get('/leagues', function () {
    return LeagueResource::collection(League::all());
});

Route::get('/leagues/{id}', function ($id) {
    return new LeagueResource(League::find($id));
});

/**
 * EVENT ROUTES
 */
Route::get('/events', function () {
    return new EventCollection(
        Event::all()
            ->sortByDesc('event_date')
    );
});

Route::get('/events/{id}', function ($id) {
    return new EventResource(Event::find($id));
});

/**
 * EVENT TYPES
 */
Route::get('event_types', function () {
    return EventTypeResource::collection(EventType::all());
});

Route::get('event_types/{id}', function ($id) {
    return new EventTypeResource(EventType::find($id));
});

/**
 *  Fallback Route
 */
Route::fallback(function () {
    return response()->json(['route' => 'Not valid!'], 404);
});
