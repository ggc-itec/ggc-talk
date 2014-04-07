@extends('layout')

@section('content')
  <div class="page-header">
      <h1> Community Favorites </h1>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('FlickrPicController@index') }}" class="btn btn-primary">Refresh</a>
      <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-primary">Favorites</a>
    </div>
  </div>
  
  @if ($pics->isEmpty())
    <p>There are no pics!</p>
  @else
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Larger Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pics as $pic)
        <tr>
          <td>{{ $pic->content }}</td>
          <td><a href="{{ $pic->url }}">{{ $pic->name }}</a></td>
          <td>
            <a href=""
              class="btn btn-default">Upvote</a>
            <a href=""
              class="btn btn-default">Downvote</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
  
  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('FlickrPicController@index') }}" class="btn btn-primary">Refresh</a>
      <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-primary">Favorites</a>
    </div>
  </div>
@stop
