@extends('layout')
@section('content')
<div class="page-header">
	<h2> We the students petition for the class {{$thePetition->class_name}} </h2>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<p>{{$thePetition->class_desc}}</p>
	</div>
</div>
<div>
	<form class="form-horizontal" action="{{ action('PetitionController@handleSignPetition') }}" method="post">
		<input type="hidden" name="user_id" value="{{ Auth::user() -> id }}" />
		<input type="hidden" name="petition_id" value="{{ $thePetition->id }}" />
		<input type="submit" class="btn btn-primary" value="Sign" />
		<a href="{{ URL::to('petitions') }}" class="btn btn-danger">Cancel</a>
	</form>
	
</div>

@stop
