<?php

namespace App\Http\Controllers;
use App\song;
use Illuminate\Http\Request;

class PlayController extends Controller{

  /**
  *Display a listening ofthe resouce.
  *@return \Illuminate\Http\Response
  */
  public function index($fileName){
    $songs = Song::all();
    return view('Indexes.playSearch', ['songs' => $songs, 'filename' => $fileName]);
  }



}
