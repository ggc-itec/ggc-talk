@extends('layout')

@section('content')

<script src="{{ asset('js/housingScript.js'); }}"></script>

<div class="page-header">
	<div class="navbar-right">
		<a class="btn btn-primary" href="{{ action('HousingController@addListing') }}">Post</a>
	</div>
	<div class="navbar-link">
		<a class="btn btn-success" href="{{ action('HousingController@viewMyListings') }}">Done</a>
		<a class="btn btn-primary" href="#">Edit</a>
		<a class="btn btn-danger" data-toggle="modal" data-target="#deletePostModal">Delete</a>

		<script type="text/javascript">
			$(document).ready(function() {
				// set modal-dialog height
				$('#modalDialog').css("height", "250px");

				// set offset for margin-top to position modal slightly off center on page
				var offset = ($(window).height() - ($('#modalDialog').height() * 2)) / 2;
				$('#modalDialog').css("margin-top", offset);
			});
		</script>
		
		<div id="deletePostModal" class="modal fade" data-backdrop="static" style="outline: none;" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog" id="modalDialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Warning!</h4>
					</div>
					<div class="modal-body">
						<h2 style="text-align: center;">Are you sure you want to delete this listing?</h2>
					</div>
					<div class="modal-footer">
						<a class="btn btn-warning" href="{{ action('HousingController@handleDeleteListing', $housing_listing->id) }}">Yes</a>
						<a class="btn btn-success" data-dismiss="modal">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h3>${{ $housing_listing->rent }}/{{ $housing_listing->bedrooms }}br - {{ $housing_listing->title }} ({{ $housing_listing->city }}, GA)</h3>
</div>

@include('housing.listingContent')

@stop


