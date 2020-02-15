@extends('layouts.artistsList')

@section('content')
  <p>Artists available</p>
  <ul>
    @foreach ($artists as $artist)
      <li>{{$artist->name}}</li>
    @endforeach
  </ul>
@endsection
