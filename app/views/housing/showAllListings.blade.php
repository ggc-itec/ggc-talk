@extends('housing/searchBar')

@section('xtraContent')

<div class="panel" style="padding: 5px 100px; margin-top: -30px;">
	@if ($housing_listings->count())
		@foreach ($housing_listings as $listing)
			<?php $id = $listing->id ?>
			<div class="row">
				<h4>
					<?php $pic = json_decode($listing->images->first(), true); ?>
					@if ($pic != null)
						<img style="max-height: 50px; max-width: 50px;" src="{{URL::asset( 'images/housing_pics/' . $id . '/' . $pic['filename'] ); }}"/>
					@endif
			
					<a href="{{ action('HousingController@viewListing', $id) }}">{{ $listing->title }}</a>
					 - ${{ $listing->rent }} / {{ $listing->bedrooms }}br
					 @if ($listing->distance > 0)- within {{ $listing->distance }} mi. @endif ({{ $listing->city }}, GA)
			
					@if ($pic != null)
						<label style="color: orange;">pic</label>
					@endif
				</h4>
			</div>
		@endforeach
	@else
		<h3 class="container" style="width: 325px;">Be the first to post a listing!</h3>
	@endif
	
	{{ $housing_listings->links() }}
</div>

@stop
