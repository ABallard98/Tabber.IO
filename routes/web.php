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


//Home Page
Route::get('/', 'HomeController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

//Play file page
Route::get('play/{fileName}', 'PlayController@index');

//Artist Collection page
Route::get('artists', 'ArtistController@index');

//Songs Collection Page
Route::get('songs', 'SongController@index');

//Artist Collection Page
Route::get('artist/{name}', 'ArtistDetailsController@index');
