
@extends('layouts.songsList')

@section('content')
  <table>
    <tr>
      <th>Song Name</th>
      <th>Artist</th>
    </tr>
    @foreach ($songs as $song)
      <tr>
        <td> <a href="/play/{{$song->fileName}}"> {{$song->title}} </a> </td>
        <td> <a href="/artist/{{$song->artist}}"> {{$song->artist}} </a> </td>
      </tr>
    @endforeach
  </table>
@endsection
