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
Route::get('/about', 'PageController@about'); 
Route::get('/tests', 'PageController@tests');

Route::get('/guild/{id}/events/', 'EventController@guild');
Route::get('/guild/{id}/event/{event_id}', 'EventStatController@guild');
Route::get('/member/{member_id}/event/{event_id}', 'EventStatController@member');

Route::resource('guild', 'GuildController'); 
Route::resource('event_type', 'EventTypeController')->except(['show']);
Route::resource('events', 'EventController')->except(['show']);
Route::resource('leagues', 'LeagueController')->except(['show']);
Route::resource('members', 'MemberController');


//Fallback route - Needs further testing or replacement
Route::fallback(function () {
    return back()->with('error', 'Page not available/Does not exist');
});


// Routes to configure
  // Add/Edit/Delete event          - EventController       - Admin
  // Add/Edit Event Type            - EventTypeController   - Admin
  // Add/Edit League                - LeagueController      - Admin
  // Dashboard                      - DashboardController   - Admin
  // Add/Edit/Delete event_stat     - EventStatController   - User/Admin
  // Register                       - PagesController
  // Login                          - PagesController