@extends('layout')

@section('content')

<div class="page-header" style="margin-top: 60px;">
	<h3>Post New Housing Listing</h3>
</div>

{{ Form::open([ 'class' => 'form-horizontal', 'action' => 'HousingController@handleAddPost', 'files' => true]) }}
	<div class="form-group col-md-9" style="margin-right: 20px;">
		{{ Form::label('title', 'Title', ['class' => 'control-label']) }}
		{{ $errors->first('title', '<span class="error">:message</span>') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('city', 'City', ['class' => 'control-label']) }}
		{{ $errors->first('city', '<span class="error">:message</span>') }}
		{{ Form::text('city', null, ['class' => 'form-control', 'style' => 'width: 125px;']) }}
	</div>
	
	<div class="form-group col-md-1">
		{{ Form::label('', 'State', ['class' => 'control-label']) }}
		{{ Form::text('', 'GA', ['class' => 'form-control', 'disabled' => 'disabled', 'style' => 'width: 55px; text-align: center;']) }}
	</div>

	<div class="form-group col-md-12">
		{{ Form::label('body', 'Body', ['class' => 'control-label']) }}
		{{ $errors->first('body', '<span class="error">:message</span>') }}
		{{ Form::textarea('body', null, ['size' => '0x7', 'class' => 'form-control']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('rent', 'Rent', ['class' => 'control-label']) }}
		{{ $errors->first('rent', '<span class="error">:message</span>') }}
		{{ Form::text('rent', null, ['class' => 'form-control', 'placeholder' => '$ no commas', 'style' => 'width: 125px;']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 25px;">
		{{ Form::label('distance', 'Distance', ['class' => 'control-label']) }}
		{{ Form::select('distance', array(
			'' => 'from GGC', 
			'5' => 'within 5 miles', 
			'10' => 'within 10 miles', 
			'15' => 'within 15 miles', 
			'20' => 'within 20 miles', 
			'25' => 'within 25 miles'), '', ['class' => 'form-control', 'style' => 'width: 145px;']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('type', 'Type', ['class' => 'control-label']) }}
		{{ Form::select('type', array(
			'apartment' => 'apartment', 
			'condo' => 'condo', 
			'duplex' => 'duplex', 
			'townhouse' => 'townhouse', 
			'house' => 'house'), 'apartment', ['class' => 'form-control', 'style' => 'width: 125px;']) }}
	</div>

	<div class="form-group col-md-3">
		{{ Form::label('bedrooms', 'Bedrooms', ['class' => 'control-label']) }}
		{{ $errors->first('bedrooms', '<span class="error">:message</span>') }}
		{{ Form::select('bedrooms', array(
			'' => 'select', 
			'1' => '1', 
			'2' => '2', 
			'3' => '3', 
			'4' => '4', 
			'5' => '5'), '', ['class' => 'form-control', 'style' => 'width: 100px;']) }}
	</div>
	
	
	<fieldset class="fieldset-norm col-md-12">
		<legend class="legend-norm">Pics</legend>
		<div class="form-inline col-md-11 col-md-offset-1" style="margin-top: -50px;">
			<div class="form-group col-md-5" style="margin-right: 75px;">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic1', '<span class="error">:message</span>') }}
  				{{ Form::file('pic1', ['class' => 'form-control', 'style' => 'margin-top: -20px']) }}
			</div>
			
			<div class="form-group col-md-5">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic2', '<span class="error">:message</span>') }}
  				{{ Form::file('pic2', ['class' => 'form-control', 'style' => 'margin-top: -20px']) }}
			</div>
		</div>
	
			
		<div class="form-inline col-md-11 col-md-offset-1">
			<div class="form-group col-md-5" style="margin-right: 75px;">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic3', '<span class="error">:message</span>') }}
  				{{ Form::file('pic3', ['class' => 'form-control', 'style' => 'margin-top: -20px']) }}
			</div>
	
			<div class="form-group col-md-5">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic4', '<span class="error">:message</span>') }}
  				{{ Form::file('pic4', ['class' => 'form-control', 'style' => 'margin-top: -20px']) }}
			</div>
		</div>
	</fieldset>
	
	<div class="col-md-2 col-md-offset-10">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ action('HousingController@showListings') }}" class="btn btn-danger">cancel</a>
	</div>
{{ Form::close() }}

@stop
