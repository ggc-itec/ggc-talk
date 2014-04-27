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
{{  Form::open(array('action' => 'PostController@store'))  }}   
    <div class="form-group other">
      <label for="Topic">Topic: {{$topic->title}}</label>
      {{   Form::hidden('topicID',  $topic->id)  }}
    </div>  
    <div class="form-group">
      <label for="Topic">Temp_Username</label>
      <input type="text" class="form-control" name="temp_username" />
    </div>  
    <div class="form-group">
      <label for="message">message</label>
      <input type="text" class="form-control" name="message" />
    </div>    
{{  Form::submit('Add!', array('class' => 'btn btn-primary'))  }}
{{ Form::close() }}
@stop
