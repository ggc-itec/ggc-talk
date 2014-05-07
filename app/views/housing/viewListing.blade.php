@extends('layout')

@section('content')

<div class="page-header">
	<div class="navbar-link">
		<span style="font-size: 12px;">Posted: today</span>
	</div>
	<h3>${{ $housing_listing->rent }}/{{ $housing_listing->bedrooms }}br - {{ $housing_listing->title }} ({{ $housing_listing->city }}, GA)</h3>
</div>

@include('housing.listingContent')

@stop
