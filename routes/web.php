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

// View pages via web.php

// Route::get('/', function(){
//     return view('pages.index');
// });

// Route::get('/about', function(){
//     return view('pages.about');
// });

// View pages via controllers

Route::get('/', 'PageController@index');
Route::get('/events', 'PageController@events');
Route::get('/about', 'PageController@about'); 
Route::get('/tests', 'PageController@tests');

Route::resource('guild', 'GuildController'); 
Route::resource('players', 'PlayerController');