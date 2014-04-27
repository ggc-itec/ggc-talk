@extends('layout')

@section('content')

<div class="page-header">
	<h3>Topics</h3>
</div>

{{  Form::open(array('action' => 'Posts_TopicController@store'))  }}
	
	
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">title</label>
		<input type="text" class="form-control" name="title"/>
	</div>
		<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">Category: </label>
		
		
		{{ Form::select('category', $categories , Input::old('category')) }}
		

	</div>
	

{{  Form::submit('Add!', array('class' => 'btn btn-primary'))  }}
{{ Form::close() }}

@stop