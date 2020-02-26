@extends('layouts.home')

@section('songTable')
  <table id="searchResults">
      @foreach ($songs as $song)
        <tr>
          <td> <a href="/play/{{$song->fileName}}"> {{$song->title}} - {{$song->artist}} </a> </td>
        </tr>
      @endforeach
  </table>
@endsection
