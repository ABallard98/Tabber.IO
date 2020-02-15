<?php

namespace App\Http\Controllers;
use App\Song;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class artistDetailsController extends Controller {

  /**
  *Display a listening of the resource
  *@return \Illuminate\Http\Response
  */
  public function index($name){
    $name = str_replace("%20"," ",$name);
    $name = ucwords($name);
    $songs = Song::all()->where('artist', $name);
    return view('Indexes.artistDetailsIndex', ['songs' => $songs]);
  }

}
