@extends('layout')

@section('content')

<div class="page-header">
  <h1>Comments</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <a href="{{ action('ImgrrController@imageGallery') }}" class="btn btn-primary">Return to Gallery</a>
  </div>
</div>

<!-- show image -->
<img class="img-rounded" src="{{ URL::asset( 'images/' . $imgrr_pic->filename ); }}"/>

<!-- form for adding a comment -->
<form action="{{ action('ImgrrController@addComment') }}" method="post" role="form">
  <input type="hidden" name="id" value="{{ $imgrr_pic->id }}">
   
  <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" name="comment" />
  </div>
    
  <input type="submit" value="Post" class="btn btn-primary" />
</form>

<!-- display existing comments --> 
<!-- FIXME refactor the following code, it is ugly -->
<?php $i = count($imgrr_pic->comments()->get()); ?>
@foreach($imgrr_pic->comments()->get()->reverse() as $comment)
  <p>{{ $i }}</p>
  <p>{{ $comment->comment }}</p>
  <?php $i = $i - 1; ?>
@endforeach


@stop