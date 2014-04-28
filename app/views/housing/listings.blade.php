@extends('layout')

{{-- dd($housing_listings->toArray()) --}}

@section('content')
<div class="page-header" style="margin-top: 60px;">
	<div class="navbar-right btn-toolbar">
		{{-- if user is logged in, allow view of own listings and allow post --}}
		@if(Auth::check())
		<a class="btn btn-primary" href="#"> My Listings </a>
		<a class="btn btn-primary" href="{{ action('HousingController@postListing') }}"> Post </a>

		{{-- if user is guest, don't allow view of own listings nor post privileges, and alert to log in with modal--}}
		@else
		<a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Post</a>

		<script type="text/javascript">
			$(document).ready(function() {
				// set modal-dialog height
				$('#modalDialog').css("height", "250px");

				// set offset for margin-top to position modal slightly off center on page
				var offset = ($(window).height() - ($('#modalDialog').height() * 2)) / 2;
				$('#modalDialog').css("margin-top", offset);
			});
		</script>

		<div id="myModal" class="modal fade" data-backdrop="static" style="background-color: rgba(0,0,0,.7); outline: none;" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" id="modalDialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Notice</h4>
					</div>
					<div class="modal-body">
						<h2 style="text-align: center;">You must be logged in to post a listing.</h2>
					</div>
					<div class="modal-footer">
						<a class="btn btn-success" href="{{ action('HousingController@redirectToLogin') }}">Login</a>
						<a class="btn btn-primary" href="{{ action('HousingController@redirectToRegister') }}">Register</a>
						<a class="btn btn-danger" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
	<h1>Housing</h1>
	<h3>GGC Community</h3>
</div>

<div class="navbar navbar-inverse">
	<form class="navbar-form" role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search..." name="searchText"/>
		</div>
		<div class="form-group" style="margin-right: 10px;">
			<button type="submit" class="btn btn-info">
				Search
			</button>
		</div>

		<label class="label">rent: </label>

		<div class="form-group">
			<input style="width: 70px; margin-right: 10px;" type="text" class="form-control" placeholder="$ max" name="maxRent"/>
		</div>

		<div class="form-group">
			<select class="form-control" name="distance" style="margin-right: 10px;">
				<option value="">any distance from GGC</option>
				<option value="5">within 5 miles</option>
				<option value="10">within 10 miles</option>
				<option value="15">within 15 miles</option>
				<option value="20">within 20 miles</option>
				<option value="25">within 25 miles</option>
			</select>
		</div>

		<div class="form-group">
			<select class="form-control" name="housingType" style="margin-right: 10px;">
				<option value="">any housing type</option>
				<option value="apartment">apartment</option>
				<option value="condo">condo</option>
				<option value="duplex">duplex</option>
				<option value="townhouse">townhouse</option>
				<option value="house">house</option>
			</select>
		</div>

		<div class="form-group">
			<select class="form-control" name="minRooms" style="margin-right: 10px;">
				<option value="">0+ BR</option>
				<option value="1">1+ BR</option>
				<option value="2">2+ BR</option>
				<option value="3">3+ BR</option>
				<option value="4">4+ BR</option>
				<option value="5">5+ BR</option>
			</select>
		</div>

		<div class="form-group">
			<label class="label" style="font-weight: normal;">
				<input type="checkbox"/>
				pic</label>
		</div>
	</form>
</div>
@stop

@section('xtraContent')
<div class="panel" style="padding: 5px 100px; margin-top: -30px;">
	@foreach ($housing_listings as $listing)
	<div class="row">
		<h4>
			<?php $pic = json_decode($listing->images->first(), true); ?>
			@if ($pic != null)
			<img src="{{URL::asset( 'images/' . $pic['filename'] ); }}" width="50px"/>
			@endif
			
			<a href="{{ action('HousingController@viewListing', $listing->id) }}">{{ $listing->title }}</a> - ${{ $listing->rent }} / {{ $listing->bedrooms }}br ({{ $listing->city }}, GA)
			
			@if ($pic != null)
			<label style="color: orange;">pic</label>
			@endif
		</h4>
			
	</div>
	@endforeach
</div>
@stop
