@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">    
  </div>
</div>

<table>
  @if (count($posts) > 0)	
  @foreach ($posts as $post)
  <tr>  

  </td>Topic: {{ $post->topic->title}}</td>
</td>{{ $post->topic->description}}</td>
</td>Posts: {{ $post->message}}</td>
<div class="form-group">
  <label for="comment">Comment</label>
  <input type="text" class="form-control" name="comment" />
</div>

</tr>

@endforeach
@else
<p> No Posts Found :( </p>
@endif  
</table>
@stop