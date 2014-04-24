@extends('layout')

@section('content')
<div class="page-header">
	<h1> Petition for a Class </h1>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<a href="{{ action('PetitionController@showCreatePetition') }}" class="btn btn-primary">Create Petiton</a>
	</div>
</div>

@stop