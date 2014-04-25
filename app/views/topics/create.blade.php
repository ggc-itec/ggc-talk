@extends('layout')

@section('content')

<div class="page-header">
	<h3>Topics</h3>
</div>

{{  Form::open(array('action' => 'Posts_TopicController@store'))  }}
	
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">id</label>
		<input type="text" class="form-control" name="id"/>
	</div>
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">title</label>
		<input type="text" class="form-control" name="title"/>
	</div>
		<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">category_id</label>
		<input type="text" class="form-control" name="category_id"/>
	</div>

{{ Form::close() }}

@stop