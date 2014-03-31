@extends('layout')

@section('content')
	<div class="page-header">
		<h1>Create Location <small>cypress creek</small></h1>
  </div>
  
  <form action="{{ action('LocationController@handleCreate') }}" method="post" role="form">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" />
    </div>
    
    <div class="form-group">
      <label for="longitude">Longitude</label>
      <input type="text" class="form-control" name="longitude" />
    </div>
    
    <div class="form-group">
      <label for="latitude">Latitude</label>
      <input type="text" class="form-control" name="latitude" />
    </div>
    
     <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" />
    </div>
    
    <input type="submit" value="Create" class="btn btn-primary" />
    <a href="{{ action('LocationController@showList') }}" class="btn btn-link">Cancel</a>
  </form>
@stop