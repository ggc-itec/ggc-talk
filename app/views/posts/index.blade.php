@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    
  </div>

</div>

@foreach ($posts as $post)
    <p>This is user {{ $post->id }}</p>
    <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" name="comment" />
  </div>
    
@endforeach
