@extends('layout')

@section('content')

<div class="page-header">
	<div class="navbar-right">
		{{-- if user is logged in, allow view of own listings and allow post --}}
		@if(Auth::check())
		<a class="btn btn-primary" href="{{ action('HousingController@viewMyListings') }}"> My Listings </a>
		<a class="btn btn-primary" href="{{ action('HousingController@addListing') }}"> Post </a>

		{{-- if user is guest, don't allow view of own listings nor post privileges, and alert to log in with modal--}}
		@else
		<a class="btn btn-primary" data-toggle="modal" data-target="#postModal">Post</a>

		<script type="text/javascript">
			$(document).ready(function() {
				// set modal-dialog height
				$('#modalDialog').css("height", "250px");

				// set offset for margin-top to position modal slightly off center on page
				var offset = ($(window).height() - ($('#modalDialog').height() * 2)) / 2;
				$('#modalDialog').css("margin-top", offset);
			});
		</script>

		<div id="postModal" class="modal fade" data-backdrop="static" style="outline: none;" tabindex="-1" aria-hidden="true">
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
	
	{{ Form::open([ 'class' => 'navbar-form', 'action' => 'HousingController@showSearchResults', 'style' => 'border: none', 'role' => 'search', 'method' => 'get']) }}
		<div class="form-group">
			{{ Form::input('search', 'searchText', Input::get('searchText', null), ['class' => 'form-control', 'placeholder' => 'Search...']) }}
		</div>
		<div class="form-group" style="margin-right: 10px;">
			<button type="submit" class="btn btn-info">
				Search
			</button>
		</div>
		
		{{ Form::label('', 'rent: ', ['class' => 'label']) }}

		<div class="form-group">
			{{ Form::text('rent', Input::get('rent', null), ['class' => 'form-control', 'placeholder' => '$ max', 'style' => 'width: 70px; margin-right: 10px;']) }}
		</div>

		<div class="form-group">
			{{ Form::select('distance', array(
				'' => 'any distance from GGC', 
				'5' => '5 miles or less', 
				'10' => '10 miles or less', 
				'15' => '15 miles or less', 
				'20' => '20 miles or less', 
				'25' => '25 miles or less'), Input::get('distance', ''), ['class' => 'form-control', 'style' => 'margin-right: 10px;']) }}
		</div>

		<div class="form-group">
			{{ Form::select('type', array(
				'' => 'any housing type',
				'apartment' => 'apartment', 
				'condo' => 'condo', 
				'duplex' => 'duplex', 
				'townhouse' => 'townhouse', 
				'house' => 'house'), Input::get('type', ''), ['class' => 'form-control', 'style' => 'margin-right: 10px;']) }}
		</div>

		<div class="form-group">
			{{ Form::select('bedrooms', array(
				'' => '0+ BR', 
				'1' => '1+ BR', 
				'2' => '2+ BR', 
				'3' => '3+ BR', 
				'4' => '4+ BR', 
				'5' => '5+ BR'), Input::get('bedrooms', ''), ['class' => 'form-control', 'style' => 'margin-right: 10px;']) }}
		</div>

		<div class="form-group">
			{{ Form::checkbox('hasPic', '1', Input::get('hasPic'), ['style' => 'width: 20px; height: 20px;']) }}
			
		</div>
		
		<div class="form-group">
			{{ Form::label('', 'pic', ['class' => 'label', 'style' => 'height: 30px; font-weight: normal; margin-left: -10px;']) }}
		</div>
	{{ Form::close() }}
</div>
@stop

@yeild('xtraContent')

