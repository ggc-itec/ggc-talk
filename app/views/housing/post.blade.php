@extends('layout')

@section('content')

{{-- if user is a guest/not logged in, modal message is displayed to either login or register --}}
@if ( Auth::guest() )

<script type="text/javascript">
	$(window).load(function() {
		// set modal-dialog height
		$('#modalDialog').css("height", "250px");
		
		// set offset for margin-top to center modal on page
		var offset = ($(window).height() - $('#modalDialog').height()) / 2;
		$('#modalDialog').css("margin-top", offset);
		
		// display centered modal
		$('#myModal').modal('show');
	}); 
</script>

<div id="myModal" class="modal fade in" data-backdrop="static" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog" id="modalDialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">Notice</h4>
			</div>
			<div class="modal-body">
				<p>
					You must be logged in to post a listing.
				</p>
			</div>
			<div class="modal-footer">
				<a class="btn btn-success" href="{{ action('HousingController@redirectToLogin') }}">Login</a>
				<a class="btn btn-primary" href="{{ action('HousingController@redirectToRegister') }}">Register</a>
				<a class="btn btn-danger" href="{{ action('HousingController@showListings') }}">Cancel</a>
			</div>
		</div>
	</div>
</div>

@endif

<div class="page-header">
	<h3>Post New Housing Listing</h3>
</div>

<form class="form-horizontal" action="{{ action('HousingController@handleAddPost') }}" method="post" role="form">
	<div class="form-group col-md-9" style="margin-right: 5px;">
		<label class="control-label">Title</label>
		<input type="text" class="form-control"/>
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		<label class="control-label">City</label>
		<input type="text" class="form-control"/>
	</div>
	
	<div class="form-group col-md-1">
		<label class="control-label">State</label>
		<input type="text" class="form-control" value="GA" disabled="disabled"/>
	</div>

	<div class="form-group col-md-12">
		<label class="control-label">Body</label>
		<textarea class="form-control" rows="10"></textarea>
	</div>

	<div class="form-group col-md-2"  style="margin-right: 5px;">
		<label class="control-label">Rent</label>
		<input type="text" class="form-control" placeholder="$ asking" name="maxRent"/>
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		<label class="control-label">Distance</label>
		<select class="form-control"  style="padding-left: 10px;" name="distance">
			<option value="">from GGC</option>
			<option value="5">within 5 miles</option>
			<option value="10">within 10 miles</option>
			<option value="15">within 15 miles</option>
			<option value="20">within 20 miles</option>
			<option value="25">within 25 miles</option>
		</select>
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		<label class="control-label">Type</label>
		<select class="form-control" name="housingType">
			<option value="apartment">apartment</option>
			<option value="condo">condo</option>
			<option value="duplex">duplex</option>
			<option value="townhouse">townhouse</option>
			<option value="house">house</option>
		</select>
	</div>

	<div class="form-group col-md-2">
		<label class="control-label">Bedrooms</label>
		<select class="form-control" name="minRooms">
			<option value="">select</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</div>

	<div class="form-group col-md-12">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ action('HousingController@showListings') }}" class="btn btn-danger">cancel</a>
	</div>
</form>

@stop
