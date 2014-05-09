@extends('layout')

@section('content')

<div class="page-header">
	<h2>Edit Housing Listing</h2>
</div>

{{ Form::open([ 'class' => 'form-horizontal', 'action' => array('HousingController@handleEditListing', $housing_listing->id), 'files' => true]) }}
	<div class="form-group col-md-9" style="margin-right: 20px;">
		{{ Form::label('title', 'Title', ['class' => 'control-label']) }}
		{{ $errors->first('title', '<span class="error">:message</span>') }}
		{{ Form::text('title', $housing_listing->title, ['class' => 'form-control']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('city', 'City', ['class' => 'control-label']) }}
		{{ $errors->first('city', '<span class="error">:message</span>') }}
		{{ Form::text('city', $housing_listing->city, ['class' => 'form-control', 'style' => 'width: 125px;']) }}
	</div>
	
	<div class="form-group col-md-1">
		{{ Form::label('', 'State', ['class' => 'control-label']) }}
		{{ Form::text('', 'GA', ['class' => 'form-control', 'disabled' => 'disabled', 'style' => 'width: 55px; text-align: center;']) }}
	</div>

	<div class="form-group col-md-12">
		{{ Form::label('body', 'Body', ['class' => 'control-label']) }}
		{{ $errors->first('body', '<span class="error">:message</span>') }}
		{{ Form::textarea('body', $housing_listing->body, ['size' => '0x7', 'class' => 'form-control']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('rent', 'Rent', ['class' => 'control-label']) }}
		{{ $errors->first('rent', '<span class="error">:message</span>') }}
		{{ Form::text('rent', $housing_listing->rent, ['class' => 'form-control', 'placeholder' => '$ no commas', 'style' => 'width: 125px;']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 25px;">
		{{ Form::label('distance', 'Distance', ['class' => 'control-label']) }}
		{{ Form::select('distance', array(
			'' => 'from GGC', 
			'5' => 'within 5 miles', 
			'10' => 'within 10 miles', 
			'15' => 'within 15 miles', 
			'20' => 'within 20 miles', 
			'25' => 'within 25 miles'), $housing_listing->distance, ['class' => 'form-control', 'style' => 'width: 145px;']) }}
	</div>

	<div class="form-group col-md-2" style="margin-right: 5px;">
		{{ Form::label('type', 'Type', ['class' => 'control-label']) }}
		{{ Form::select('type', array(
			'apartment' => 'apartment', 
			'condo' => 'condo', 
			'duplex' => 'duplex', 
			'townhouse' => 'townhouse', 
			'house' => 'house'), $housing_listing->type, ['class' => 'form-control', 'style' => 'width: 125px;']) }}
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
			'5' => '5'), $housing_listing->bedrooms, ['class' => 'form-control', 'style' => 'width: 100px;']) }}
	</div>
	
	<fieldset class="fieldset-norm col-md-5" style="padding-right: 0px; margin-right: 20px;">
		<legend class="legend-norm">Contact Info</legend>
		<div class="form-group col-md-12" style="margin-top: -50px; margin-bottom: 0px; padding: 0 0 0 10px;">
			<h6 style="margin: 15px 15px 0px 0;">If you do not provide either a phone number or an alternate email address, your GGC email will be displayed by default.</h6>
			
			<div class="form-group col-md-12">
				{{ Form::label('', 'Display GGC Email', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				@if ($housing_listing->displayAuthor_Email == 1)
					{{ Form::checkbox('displayAuthor_Email', '1', true) }}
				@else
					{{ Form::checkbox('displayAuthor_Email', '1') }}
				@endif
			</div>
			
			<div class="form-group col-md-6" style="margin-right: 30px; margin-top: -25px;">
				{{ Form::label('', 'Phone Number', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				{{ $errors->first('contactPhone', '<span class="error">:message</span>') }}
  				{{ Form::text('contactPhone', $housing_listing->contactPhone, ['class' => 'form-control', 'placeholder' => 'xxx-xxx-xxxx', 'style' => 'width: 190px;']) }}
			</div>
			
			<div class="form-group col-md-6" style="margin-right: 0px; margin-top: -25px;">
				{{ Form::label('', 'Alt. Email', ['class' => 'control-label', 'style' => 'font-size: 14px;']) }}
				{{ $errors->first('alternateEmail', '<span class="error">:message</span>') }}
  				{{ Form::text('alternateEmail', $housing_listing->alternateEmail, ['class' => 'form-control', 'placeholder' => 'example@provider.com', 'style' => 'width: 190px;']) }}
			</div>
		</div>
	</fieldset>
	
	<?php $pics = $housing_listing->images()->get()->toArray();?>
	<fieldset class="fieldset-norm col-md-6" style="padding-right: 0px; padding-bottom: 10px;">
		<legend class="legend-norm">Edit Pics</legend>
		<div class="form-inline col-md-12" style="margin-top: -50px; margin-left: -5px; padding: 0px;">
			<div class="form-group col-md-6" style="margin-right: 20px;">
				<div style="margin-top: 20px; height: 90px; width: 125px; display: inline-block;">
					<img style="max-height: 85px;" <?php if ($pics != null && count($pics) >= 1) { ?>class="img-thumbnail" src="{{ URL::asset( 'images/housing_pics/' . $housing_listing->id . '/' . $pics[0]['filename'] ); }}"<?php } ?>/>
				</div>
				@if ($pics != null && count($pics) >= 1)
				{{ Form::hidden('picID_1', $pics[0]['id'], ['class' => 'form-control'])}}
				{{ Form::checkbox('removePic1', '1')}}
				{{ Form::label('', 'Remove', ['style' => 'font-size: 14px;'])}}
				@endif
				{{ $errors->first('pic1', '<span class="error">:message</span>') }}
  				{{ Form::file('pic1', ['class' => 'form-control', 'style' => 'width: 230px;']) }}
			</div>
			
			<div class="form-group col-md-6">
				<div style="margin-top: 20px; height: 90px; width: 125px; display: inline-block;">
					<img style="max-height: 85px;" <?php if ($pics != null && count($pics) >= 2) { ?>class="img-thumbnail" src="{{ URL::asset( 'images/housing_pics/' . $housing_listing->id . '/' . $pics[1]['filename'] ); }}"<?php } ?>/>
				</div>
				@if ($pics != null && count($pics) >= 2)
				{{ Form::hidden('picID_2', $pics[1]['id'], ['class' => 'form-control'])}}
				{{ Form::checkbox('removePic2', '1')}}
				{{ Form::label('', 'Remove', ['style' => 'font-size: 14px;'])}}
				@endif
				{{ $errors->first('pic2', '<span class="error">:message</span>') }}
  				{{ Form::file('pic2', ['class' => 'form-control', 'style' => 'width: 230px;', 'value' => 'add']) }}
			</div>
		</div>
			
		<div class="form-inline col-md-12" style="margin-left: -5px; padding: 0;">
			<div class="form-group col-md-6" style="margin-right: 20px;">
				<div style="margin-top: 10px; height: 90px; width: 125px; display: inline-block;">
					<img style="max-height: 85px;" <?php if ($pics != null && count($pics) >= 3) { ?>class="img-thumbnail" src="{{ URL::asset( 'images/housing_pics/' . $housing_listing->id . '/' . $pics[2]['filename'] ); }}"<?php } ?>/>
				</div>
				@if ($pics != null && count($pics) >= 3)
				{{ Form::hidden('picID_3', $pics[2]['id'], ['class' => 'form-control'])}}
				{{ Form::checkbox('removePic3', '1')}}
				{{ Form::label('', 'Remove', ['style' => 'font-size: 14px;'])}}
				@endif
				{{ $errors->first('pic3', '<span class="error">:message</span>') }}
  				{{ Form::file('pic3', ['class' => 'form-control', 'style' => 'margin-top: -20px; width: 230px;']) }}
			</div>
	
			<div class="form-group col-md-6">
				<div style="margin-top: 10px; height: 90px; width: 125px; display: inline-block;">
					<img style="max-height: 85px;" <?php if ($pics != null && count($pics) >= 4) { ?>class="img-thumbnail" src="{{ URL::asset( 'images/housing_pics/' . $housing_listing->id . '/' . $pics[3]['filename'] ); }}"<?php } ?>/>
				</div>
				@if ($pics != null && count($pics) == 4)
				{{ Form::hidden('picID_4', $pics[3]['id'], ['class' => 'form-control'])}}
				{{ Form::checkbox('removePic4', '1')}}
				{{ Form::label('', 'Remove', ['style' => 'font-size: 14px;'])}}
				@endif
				{{ $errors->first('pic4', '<span class="error">:message</span>') }}
  				{{ Form::file('pic4', ['class' => 'form-control', 'style' => 'margin-top: -20px; width: 230px;']) }}
			</div>
		</div>
	</fieldset>
	
	<div class="col-md-2 col-md-offset-10">
		<input type="submit" class="btn btn-primary" value="Save" />
		<a href="{{ action('HousingController@previewListing', $housing_listing->id) }}" class="btn btn-danger">cancel</a>
	</div>
{{ Form::close() }}

@stop