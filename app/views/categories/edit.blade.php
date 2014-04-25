@extends('layout')

@section('content')
{{  Form::open(array('action' => array('Posts_CategoryController@update', $category->id)))  }}
				
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">id  {{  $category->id  }}</label>		
	</div>
	<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">title</label>
		<input type="text" class="form-control" name="title" value="{{  $category->title  }}"/>
	</div>
		<div class="form-group " style="margin-right: 5px;">
		<label class="control-label">description</label>
		<input type="text" class="form-control" name="description" value="{{  $category->description  }}"/>
	</div>

{{  Form::submit('Update!', array('class' => 'btn btn-primary', 'name' => 'updateButton'))  }}
{{  Form::submit('Delete!', array('class' => 'btn btn-primary', 'name' => 'deleteButton'))  }}
{{ Form::close() }}
@stop