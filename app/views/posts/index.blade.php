@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">   
    @if (count($posts) > 0)	
    @foreach ($posts as $post)
    <div class="thread">
      <div class="title">
        <h3>{{ $post->topic->title}}</h3>
      </div>
      <div class='Message'>
        <p><span class=""> message: {{ $post->message}}</span></p>         

        <div class="userInfo">
          <h6><a href="">name: {{  $post->temp_username  }}</a></h6>
          <ul class="">
            <li>  {{  Dates::showTimeAgo($post->created_at)}}</li>
          </ul>      
        </div>
        <a class="btn btn-primary" href="{{ action('PostController@create') }}"> comment </a>
      </div>
      @endforeach
      @else
      <p> No Posts Found :( </p>
      @endif  
    </div>
  </div>
</div>
@stop

