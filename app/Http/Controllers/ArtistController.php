<?php

namespace App\Http\Controllers;
use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller{

  /**
  *Display a listening ofthe resouce.
  *@return \Illuminate\Http\Response
  */
  public function index(){
    $artists = Artist::all();
    return view('Indexes.artistIndex', ['artists' => $artists]);
  }



}
