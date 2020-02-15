@extends('layouts.artistDetails')

@section('content')
  <ul>
    @foreach ($songs as $song)
      <li><a href="/play/{{$song->fileName}}">{{$song->title}} - {{$song->artist}}</a></li>
    @endforeach
  </ul>
