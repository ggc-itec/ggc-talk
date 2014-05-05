@extends('layout')

@section('content')

<div class="page-header">
	<h2>Post New Housing Listing</h2>
</div>

{{ Form::open([ 'class' => 'form-horizontal', 'action' => 'HousingController@handleAddListing', 'files' => true]) }}
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
	
	<fieldset class="fieldset-norm col-md-5" style="padding-right: 0px; margin-right: 20px;">
		<legend class="legend-norm">Contact Info</legend>
		<div class="form-group col-md-12" style="margin-top: -50px; margin-bottom: 0px; padding: 0 0 0 10px;">
			<h6 style="margin: 15px 15px 0px 0;">If you do not provide either a phone number or an alternate email address, your GGC email will be displayed by default.</h6>
			
			<div class="form-group col-md-12">
				{{ Form::label('', 'Display GGC Email', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				{{ Form::checkbox('displayAuthor_Email', '1') }}
			</div>
			
			<div class="form-group col-md-6" style="margin-right: 30px; margin-top: -25px;">
				{{ Form::label('', 'Phone Number', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				{{ $errors->first('contactPhone', '<span class="error">:message</span>') }}
  				{{ Form::text('contactPhone', null, ['class' => 'form-control', 'placeholder' => 'xxx-xxx-xxxx', 'style' => 'width: 190px;']) }}
			</div>
			
			<div class="form-group col-md-6" style="margin-right: 0px; margin-top: -25px;">
				{{ Form::label('', 'Alt. Email', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				{{ $errors->first('alternateEmail', '<span class="error">:message</span>') }}
  				{{ Form::text('alternateEmail', null, ['class' => 'form-control', 'placeholder' => 'example@provider.com', 'style' => 'width: 190px;']) }}
			</div>
		</div>
	</fieldset>
	
	<fieldset class="fieldset-norm col-md-6" style="padding-right: 0px; padding-bottom: 10px;">
		<legend class="legend-norm">Pics</legend>
		<div class="form-inline col-md-12" style="margin-top: -50px; margin-left: -5px; padding: 0px;">
			<div class="form-group col-md-6" style="margin-right: 20px;">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic1', '<span class="error">:message</span>') }}
  				{{ Form::file('pic1', ['class' => 'form-control', 'style' => 'width: 230px;']) }}
			</div>
			
			<div class="form-group col-md-6">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic2', '<span class="error">:message</span>') }}
  				{{ Form::file('pic2', ['class' => 'form-control', 'style' => 'width: 230px;']) }}
			</div>
		</div>
			
		<div class="form-inline col-md-12" style="margin-left: -5px; padding: 0;">
			<div class="form-group col-md-6" style="margin-right: 20px;">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic3', '<span class="error">:message</span>') }}
  				{{ Form::file('pic3', ['class' => 'form-control', 'style' => 'margin-top: -20px; width: 230px;']) }}
			</div>
	
			<div class="form-group col-md-6">
				{{ Form::label('', '', ['class' => 'control-label']) }}
				{{ $errors->first('pic4', '<span class="error">:message</span>') }}
  				{{ Form::file('pic4', ['class' => 'form-control', 'style' => 'margin-top: -20px; width: 230px;']) }}
			</div>
		</div>
	</fieldset>
	
	<div class="col-md-2 col-md-offset-10">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ action('HousingController@showAllListings') }}" class="btn btn-danger">cancel</a>
	</div>
{{ Form::close() }}

@stop
