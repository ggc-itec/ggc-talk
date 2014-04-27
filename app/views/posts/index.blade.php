@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    
  </div>

</div>
@if (count($posts) > 0)	
@foreach ($posts as $post)
    <p>Topic: {{ $post->topic->title}}</p>
    <p>{{ $post->topic->description}}</p>
    <p>Posts: {{ $post->message}}</p>
    <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" name="comment" />
  </div>
    
@endforeach
@else
 <p> No Posts Found :( </p>
@endif  

@stop