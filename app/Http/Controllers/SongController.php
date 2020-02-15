<?php

namespace App\Http\Controllers;
use App\Song;
use Illuminate\Http\Request;

class SongController extends Controller{

  /**
  *Display a listening ofthe resouce.
  *@return \Illuminate\Http\Response
  */
  public function index(){
    $songs = Song::all();
    return view('Indexes.index', ['songs' => $songs]);
  }



}
