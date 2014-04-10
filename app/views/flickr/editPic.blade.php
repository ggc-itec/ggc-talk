@extends('layout')

@section('content')
<div class="page-header">
	<h1>Edit name: {{ $flickr_pic->name }} <small>You sure?</small></h1>
</div>

<table>
	<tr>
		<td><div>{{ $flickr_pic->content }}</div></td>
		<td>
			<form action="{{ action('FlickrPicController@handleEdit') }}" method="post" role="form">
    			<input type="hidden" name="flickr_pic" value="{{ $flickr_pic->id }}" />
    			<label>New Name:  </label><input type="text" name="new_name" />
    			<input type="submit" class="btn btn-danger" value="Yes" />
    			<a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-default">No way, Jose!</a>
			</form>
		</td>
	</tr>
</table>

@stop