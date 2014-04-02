@extends('layout')

@section('content')
  <div class="page-header">
    <h1>Edit Location</h1>
  </div>
  
  <form action="{{ action('LocationController@handleEdit') }}" method="post" role="form">
    <input type="hidden" name="id" value="{{ $location->id }}">
    
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="{{ $location->name }}" />
    </div>
    
    <div class="form-group">
      <label for="longitude">Longitude</label>
      <input type="text" class="form-control" name="longitude" value="{{ $location->longitude }}" />
    </div>

    <div class="form-group">
      <label for="latitude">Latitude</label>
      <input type="text" class="form-control" name="latitude" value="{{ $location->latitude }}" />
    </div>    
    
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" value="{{ $location->description }}" />
    </div>
    
    <input type="submit" value="Save" class="btn btn-primary" />
    <a href="{{ action('LocationController@showList') }}" class="btn btn-link">Cancel</a>
    
  </form>
  
@stop
