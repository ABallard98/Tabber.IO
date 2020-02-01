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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/play/{fileName}', function($fileName){
  return view('play', ['fileName' => $fileName]);
});

Route::get('/playhtml', function(){
  return view('playhtml');
});

Route::get('songs', function(){
  return view('songs');
});
