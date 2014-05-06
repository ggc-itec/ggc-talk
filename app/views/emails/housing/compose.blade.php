<!DOCTYPE html>
<html lang="en-US">
  <head>
  	<link rel="stylesheet" href="{{ asset('css/bootstrap.css'); }}" rel="stylesheet">
    <meta charset="utf-8">
  </head>
  <body>
  	
  	<div class="container col-md-12">
  		{{ Form::open(['class' => 'form-horizontal', 'action' => array('HousingController@sendEmail', $housing_listing->id)]) }}
  			<br>
  			<div style="margin-bottom: 30px;">
  				<button class="btn btn-info btn-xs" type="submit"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;SEND</button>
  				<button class="btn btn-danger btn-xs" onclick="window.close()"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;DISCARD</button>
  			</div>
  		
  			<div class="form-group" style="margin-bottom: 0; line-height: 10px;">
  				{{ Form::label('', 'Subject: ', ['style'=> 'display: inline-block; padding: 4px 0 0 14px;']) }}
				{{ Form::text('subject',
				 '$' . $housing_listing->rent . '/' . $housing_listing->bedrooms . 'br - ' . $housing_listing->title . ' (' . $housing_listing->city . ', GA)',
				 ['style' => 'display: inline-block; outline: none; border: none; width: 90%;']) }}
  			</div>
			<hr style="margin: 5px 0 10px 0;"/>
			
			@if (Auth::guest())
			<div class="form-group" style="margin-bottom: 0; line-height: 10px;">
  				{{ Form::label('', 'Please enter your email: ', ['style'=> 'display: inline-block; padding: 4px 0 0 14px;']) }}
				{{ Form::text('sendersEmail', null, ['style' => 'display: inline-block; outline: none; border: none; width: 70%;', 'autofocus']) }}
  			</div>
			<hr style="margin: 5px 0 10px 0;"/>
			@endif
			
			{{ Form::label('', 'Message', ['class' => 'control-label']) }}
			{{ Form::textarea('message', null, ['size' => '0x15', 'class' => 'form-control col-md-12', 'autofocus']) }}
  		
  		{{ Form::close() }}
  	</div>
    
  </body>
</html>