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

@if($petitions->isEmpty())
<p>No Active Petitions</p>
@else
<table class="table table-condensed">
	<thead>
		<tr>
			<th>Class Name</th>
			<th>Subject</th>
		</tr>
	</thead>
	<tbody>
		@foreach($petitions as $petition)
		<tr>
			<td>{{ $petition->class_name }}</td>
			<td>{{ $petition->subject }}</td>
			<td>
				<a href="{{ action('PetitionController@showPetition', $petition->id) }}" 
					class="btn btn-default">View</a>
			@if(Auth::user() -> role == 'Admin')
				<a href="{{ action('PetitionController@handleDeletePetition', $petition->id) }}" class="btn btn-danger">Delete</a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

@stop