@extends('layout')

@section('content')
  <div class="page-header">
      <h1>Delete {{ $flickr_pic->name }} <small>you sure?</small></h1>
  </div>
  
  <form action="{{ action('FlickrPicController@handleDelete') }}" method="post" role="form">
    
    <input type="hidden" name="flickr_pic" value="{{ $flickr_pic->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-default">No way, Jose!</a>
    
  </form>

@stop