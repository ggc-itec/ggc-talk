@extends('layout')

@section('content')
<div class="jumbotron">
	<h2>Techtalks</h2>
	@if (!is_object($talks))
	
		<p>
			No talks entered.
		</p>
	
	@else
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Title</th>
				<th><a href="{{ action('TechTalkController@addTalk') }}"
				class="btn btn-primary">Add</a></th>
			</tr>
		</thead>
		<tbody>
			@foreach($talks as $talk)
			<tr>
				<td>{{ $talk->speaker }}</td>
				<td><a href="{{ action('TechTalkController@showTalk', $talk->id) }}">{{ $talk->title }}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>
@stop

