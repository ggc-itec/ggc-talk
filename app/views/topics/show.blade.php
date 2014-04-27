@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - 
    @if (count($topic) > 0)  
    {{   $topic->title   }}
    @else  
    -
    @endif
  </h1>
</div>
<div class=" mainPanel">
  <div class="panel-body ">
<a class="btn btn-primary" href="{{ action('PostController@create') }}"> add Post </a>
    @if (count($topic) > 0)          
    @foreach ($topic->posts('created_at') as $post)
    <div>
      <div class="userInfo">
      </div>
      Message: {{ $post->message }} <br>
      Name: {{ $post->temp_username }}  
    </div>
     Posted: {{ Dates::showTimeAgo($post->created_at) }}    
     <br><br> 
  @endforeach
  @else
  <p> No topics :( </p>
  @endif 

</div>
</div>
  <div class="page-header">
    <h5>Create Post <small>say something</small></h5>
  </div>  
  <form action="{{ action('PostController@store') }}" method="POST" role="form">
    <div class="form-group">
      <label for="title">title</label>

      {{ Form::label('post', $post->topic->title )}}
    </div> 
    
      
      
      {{ Form::hidden('topic', $post->topic->id) }}

    
     <div class="form-group">
      <label for="message">Temp Name</label>
      <input type="text" class="form-control" name="temp_username" />
    </div>  
    <div class="form-group">
      <label for="message">message</label>
      <input type="text" class="form-control" name="message" />
    </div>    
    <input type="submit" value="Create" class="btn btn-primary" />    
  </form>
@stop
