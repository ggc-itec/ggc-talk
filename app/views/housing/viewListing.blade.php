@extends('layout')

@section('content')

<div class="page-header">
	<div class="navbar-link">
		@if ($housing_listing->created_at == $housing_listing->updated_at)
			@if (date('H', strtotime($housing_listing->created_at)) > 13)
				<?php $timePeriod = 'pm'; ?>
			@else
				<?php $timePeriod = 'am'; ?>
			@endif
			<span style="font-size: 12px; margin-right: 10px;">posted: {{ date('M-j-Y', strtotime($housing_listing->created_at)) }}</span>
			<span style="font-size: 12px;">{{ date('g:i', strtotime($housing_listing->created_at)) . $timePeriod }}</span>
		@else
			@if (date('H', strtotime($housing_listing->updated_at)) > 13)
				<?php $timePeriod = 'pm'; ?>
			@else
				<?php $timePeriod = 'am'; ?>
			@endif
			<span style="font-size: 12px;">updated: {{ date('M-j-Y', strtotime($housing_listing->updated_at)) }}</span>
			<span style="font-size: 12px;">{{ date('g:i', strtotime($housing_listing->updated_at)) . $timePeriod }}</span>
		@endif
	</div>
	<h3>${{ $housing_listing->rent }}/{{ $housing_listing->bedrooms }}br - {{ $housing_listing->title }} ({{ $housing_listing->city }}, GA)</h3>
</div>

@include('housing.listingContent')

@stop
