@extends('layout')

@section('content')

<div class="page-header">
	<div class="navbar-right">
		<a class="btn btn-primary" href="{{ action('HousingController@addListing') }}">Post</a>
	</div>
	<h1>My Listings</h1>
</div>

@if (count($my_listings) > 0)
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr style="text-align: center;">
			<td>title</td><td>posted date</td><td>id</td>
		</tr>
	</thead>
	@foreach ($my_listings as $listing)
	<tr>
		<td><a href="{{ action('HousingController@previewListing', $listing->id) }}">{{ $listing->title }} - ${{ $listing->rent }}</a></td>
		<td>{{ $listing->created_at}}</td>
		<td>{{ $listing->id }}</td>
	</tr>
	@endforeach
</table>
@else
<h3 class="container" style="width: 450px;">You currently do not have any listings.</h3>
@endif

@stop
