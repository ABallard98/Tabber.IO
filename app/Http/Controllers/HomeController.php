<?php

namespace App\Http\Controllers;
use App\song;
use Illuminate\Http\Request;

class HomeController extends Controller{

  /**
  *Display a listening of the resource
  *@return \Illuminate\Http\Response
  */
  public function index(){
    $songs = Song::all();
    return view('Indexes.homeSearch', ['songs' => $songs]);
  }
}
