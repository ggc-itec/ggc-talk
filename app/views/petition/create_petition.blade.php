@extends('layout')
@section('content')

<div class="page-header">
	<h1> Create Petition </h1>
</div>

<form class="form-horizontal" action="" method="post" role="form">
	<div class="form-group col-md-9" style="margin-right: 5px;">
		<label class="control-label">Class Name</label>
		<input type="text" class="form-control"/>
	</div>

	<div class="form-group col-md-9">
		<label class="control-label">Class Description</label>
		<textarea class="form-control" rows="10"></textarea>
	</div>
	
	<div class="form-group col-md-12">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ URL::to('petitions') }}" class="btn btn-danger">Cancel</a>
	</div>
</form>
@stop
