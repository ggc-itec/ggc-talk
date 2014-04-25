@extends('layout')

@section('content')
{{  Form::open(array('action' => 'Posts_CategoryController@store'))  }}
	
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">id</label>
		<input type="text" class="form-control" name="id"/>
	</div>
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">title</label>
		<input type="text" class="form-control" name="title"/>
	</div>
		<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">description</label>
		<input type="text" class="form-control" name="description"/>
	</div>

{{  Form::submit('Add!', array('class' => 'btn btn-primary'))  }}
{{ Form::close() }}
@stop