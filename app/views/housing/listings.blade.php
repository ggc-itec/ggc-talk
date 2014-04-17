@extends('layout')

@section('content')
<div class="page-header">
	<div class="navbar-right btn-toolbar">
		<a class="btn btn-primary" href="#"> My Listings </a>
		<a class="btn btn-primary" href="#"> Post </a>
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
				<button type="submit" class="btn btn-info">Search</button>
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
				<label class="label" style="font-weight: normal;"><input type="checkbox"/> pic</label>
			</div>
		</form>
	</div>


@stop
