@extends('layout')

@section('content')
<script src="{{ asset('js/housingScript.js'); }}"></script>

<div class="page-header">
	<div class="navbar-link">
		<a class="btn btn-primary" style="margin-right: 30px;" href="#">reply</a>
		<span style="font-size: 12px;">Posted: today</span>
	</div>
	<h3>${{ $housing_listing->rent }}/{{ $housing_listing->bedrooms }}br - {{ $housing_listing->title }} ({{ $housing_listing->city }}, GA)</h3>
</div>

@foreach ( $housing_listing->images()->take(1)->get() as $mainPic )
<div class="col-md-6">
	<img class="img-thumbnail" src="{{ URL::asset( 'images/' . $mainPic->filename ); }}" width="400px" id="mainPic"/>
	<ul class="list-inline">
		@foreach( $housing_listing->images()->get() as $pic )
		<li><img class="btn housingPic" src="{{ URL::asset( 'images/' . $pic->filename ); }}" width="75px" style="margin-right: -20px;"/></li>
		@endforeach
	</ul>
</div>
@endforeach

<div class="col-md-6">
	<ul class="col-md-7 list-inline" style="padding: 5px;">
		<li class="btn btn-default disabled" style="color: black; padding: 5px;">{{ $housing_listing->type }}</li>
		<li class="btn btn-default disabled" style="color: black;">{{ $housing_listing->bedrooms }} bedrooms</li>
		<li class="btn btn-default disabled" style="color: black;">Rent: ${{ $housing_listing->rent }}</li>
		<?php $distance = $housing_listing->distance; ?>
		@if ($distance != 0)
		<li class="btn btn-default disabled" style="color: black;">{{ $housing_listing->distance }} miles from GGC</li>
		@endif
	</ul>
</div>

<div class="panel col-md-12" style="border-radius: 5px; border: 1px solid gray;">
	<h5>{{ nl2br($housing_listing->body) }}</h5>
</div>

@stop
