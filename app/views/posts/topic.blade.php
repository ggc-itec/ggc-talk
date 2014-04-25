@extends('layout')

@section('content')

<div class="page-header">
  <h1>Comments</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    
  </div>
</div>

<!-- form for adding a comment -->
<form action="{{ action('PostController@store') }}" method="post" role="form">
   
  <div class="form-group">
    <label for="comment">Comment</label>
    <input type="text" class="form-control" name="comment" />
  </div>
    
  <input type="submit" value="Post" class="btn btn-primary" />
</form>