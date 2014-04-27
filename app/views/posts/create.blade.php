@extends('layout')

@section('content')
	<div class="page-header">
		<h5>Create Post <small>say something</small></h5>
  </div>  
  <form action="{{ action('PostController@store') }}" method="POST" role="form">
    <div class="form-group">
      <label for="title">title</label>
      {{ Form::select('topic', $topics , Input::old('topic')) }}
    </div>    

     <div class="form-group">
      <label for="message">Temp Name</label>
      <input type="text" class="form-control" name="temp_username" />
    </div>  
    <div class="form-group">
      <label for="message">message</label>
      <input type="text" class="form-control" name="message" />
    </div>    
    <input type="submit" value="Create" class="btn btn-primary" />
    <a href="" class="btn btn-link">Clear</a>
  </form>
@stop

