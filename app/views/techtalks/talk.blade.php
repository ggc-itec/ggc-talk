@extends('layout')

@section('content')
<div class="jumbotron">
	<h1>{{ $talk->title }}</h1><small>{{ $talk->timestamp }}</small>
	<p>
		{{ $talk->speaker }}
	</p>
	<p><a href="#newcomment" class="btn btn-primary">Add Comment</a></p>
	<p><br /></p>
	

	<?php $i = count($talk -> comments() -> get());
		$count = 1; ?>

	@foreach($talk->comments()->get()->reverse() as $comment)
	<?php if ($count%2 == 0) {?>
		<div>
			<p>
				{{ $comment->body }}
			</p>
			<p style="font-size: 14px">
				{{ $comment->username }}
			</p>
		</div>
	
	<?php } else {	?>
		<div style="background-color: #a0a0a0">
			<p>
				{{ $comment->body }}
			</p>
			<p style="font-size: 14px">
				{{ $comment->username }}
			</p>
		</div>
	<?php }?>
	<br>
	<?php $count++; ?>
	@endforeach

</div>

<br>
<br>

<div class="jumbotron">
	<div id="newcomment">
		<h3>Add comment</h3>
		<form action="{{ action('TechTalkController@addComment', $talk->id) }}" method="post" role="form">
			<div class="form-group">
				<label for="longitude">Username</label>
				<input type="text" class="form-control" name="user" />
			</div>

			<div class="form-group">
				<label for="latitude">Comment</label>
				<input type="text" class="form-control" name="body" />
			</div>

			<input type="submit" value="Create" class="btn btn-primary" />
		</form>
	</div>
</div>
@stop

