<script src="{{ asset('js/housingScript.js'); }}"></script>

<?php $id = $housing_listing->id; ?>

@foreach ( $housing_listing->images()->take(1)->get() as $mainPic )
<div class="col-md-5">
	@if( count($housing_listing->images()->get()) > 1 )
		<div class="row">
			<ul class="list-inline">
				@foreach( $housing_listing->images()->get() as $pic )
					<li><img class="housingPic" src="{{ URL::asset( 'images/housing_pics/' . $id . '/' . $pic->filename ); }}" style="padding: 0; margin-bottom: 5px; max-width:65px; max-height: 65px;"/></li>
				@endforeach
			</ul>
		</div>
	@endif
	
	<div class="row">
		<img style="max-height: 400px;" class="img-thumbnail" src="{{ URL::asset( 'images/housing_pics/' . $id . '/' . $mainPic->filename ); }}" id="mainPic"/>
	</div>
</div>
@endforeach

<div class="col-md-7">
	<fieldset class="fieldset-norm col-md-12" style="padding-bottom: 0px; margin-top: -25px; margin-bottom: 5px;">
		<legend class="legend-norm">Contact Info</legend>
		<div class="form-group col-md-12" style="margin: -50px 0 0 0;">
			<h5 style="margin-top: 20px;">
				@if (Auth::guest())
					You must be logged in to view contact info.
				@else
					@if ($housing_listing->contactPhone == null && $housing_listing->alternateEmail == null)
						<b>Email: </b>{{ $housing_listing->author }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					@else
						@if ($housing_listing->contactPhone != null)
							<b>Phone number: </b>{{ $housing_listing->contactPhone }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						@endif
					
						@if ($housing_listing->alternateEmail != null && $housing_listing->displayAuthor_Email == 0)
							<b>Email: </b>{{ $housing_listing->alternateEmail }}
						@endif
					
						@if ($housing_listing->displayAuthor_Email != 0)
							<b>Email: </b>{{ $housing_listing->author }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							@if ($housing_listing->alternateEmail != null && $housing_listing->contactPhone != null)
								<br><br><b>Alt. Email: </b>{{ $housing_listing->alternateEmail }}
							@elseif($housing_listing->alternateEmail != null && $housing_listing->contactPhone == null)
								<b>Alt. Email: </b>{{ $housing_listing->alternateEmail }}
							@endif
						@endif
					@endif
				@endif
			</h5>
		</div>
	</fieldset>
	
	<ul class="col-md-12 list-inline" style="padding: 5px;">
		<li class="badge alert-danger" style="padding: 7px;">{{ $housing_listing->type }}</li>
		<li class="badge alert-danger" style="padding: 7px;">{{ $housing_listing->bedrooms }} bedrooms</li>
		<li class="badge alert-danger" style="padding: 7px;">Rent: ${{ $housing_listing->rent }}</li>
		<?php $distance = $housing_listing->distance; ?>
		@if ($distance != 0)
		<li class="badge alert-danger" style="padding: 7px;">within {{ $housing_listing->distance }} miles from GGC</li>
		@endif
	</ul>
	<div class="panel col-md-12" style="border-radius: 5px; border: 1px solid gray;">
		{{-- nl2br() allows line breaks --}}
		<h5>{{ nl2br($housing_listing->body) }}</h5>
	</div>
</div>
