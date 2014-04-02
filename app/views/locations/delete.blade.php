@extends('layout')

@section('content')
  <div class="page-header">
      <h1>Delete {{ $location->name }} <small>you sure?</small></h1>
  </div>
  
  <form action="{{ action('LocationController@handleDelete') }}" method="post" role="form">
    
    <input type="hidden" name="location" value="{{ $location->id }}" />
    <input type="submit" class="btn btn-danger" value="Yes" />
    <a href="{{ action('LocationController@showList') }}" class="btn btn-default">No way, Jose!</a>
    
  </form>

@stop
