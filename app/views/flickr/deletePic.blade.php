@extends('layout')

@section('content')
<div class="page-header">
	<h1>Delete Pic: {{ $flickr_pic->name }}</h1>
	<h2>Are you sure?</h2>
</div>

<table>
	<tr>
		<td><div>{{ $flickr_pic->content }}</div></td>
		<td>
			<form action="{{ action('FlickrPicController@handleDelete') }}" method="post" role="form">
    			<input type="hidden" name="flickr_pic" value="{{ $flickr_pic->id }}" />
    			<input type="submit" class="btn btn-danger" value="Yes" />
    			<a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-default">No way, Jose!</a>
			</form>
		</td>
	</tr>
</table>

@stop