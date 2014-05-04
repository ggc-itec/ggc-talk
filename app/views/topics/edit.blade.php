@extends('layout')

@section('content')
{{  Form::open(array('action' => array('Posts_TopicController@update', $topic->id)))  }}
				
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">id  {{  $topic->id  }}</label>		
	</div>
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">title</label>
		<input type="text" class="form-control" name="title" value="{{  $topic->title  }}"/>
	</div>
		<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">description</label>
		<input type="text" class="form-control" name="description" value="{{  $topic->description  }}"/>
	</div>
		
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">Category: {{  $topic->category->title  }}</label>
		{{ Form::hidden('categoryID',  $topic->category->id) }}
		
	</div>

{{  Form::submit('Update!', array('class' => 'btn btn-primary', 'name' => 'updateButton'))  }}
{{  Form::submit('Delete!', array('class' => 'btn btn-primary', 'name' => 'deleteButton'))  }}
{{ Form::close() }}
@stop