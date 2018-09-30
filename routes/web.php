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

Route::get('/', 'PagesController@index');
Route::get('/events', 'PagesController@events');
Route::get('/about', 'PagesController@about'); 
Route::get('/tests', 'PagesController@tests');
Route::get('/guild', 'GuildsController@index'); 