@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">   
   <div class="thread">
    <div class="title">
      <h3>header</h3>
    </div>
    @if (count($posts) > 0)	
    <h3>Main Posts</h3>
    <table class="topicTable ">
      <thead>
        <th> <h4 class="title"><span>user Info </span><a class="colspan"></a></h4> </th>
        <th> <h4 class="title"><span>Message </span><a class="colspan"></a></h4> </th>
      </thead>
      <tbody class="table-striped">
        @if (count($posts) > 0)  
        @foreach ($posts as $post)
        <tr>           
          <td>

            <div>
              {{  $post->temp_username  }}
              {{  Dates::showTimeAgo($post->created_at)}}  
            </div>

          </td>
          <td> 

            <div>
              {{ $post->message }}  
            </div>


          </td>

        </tr>

        @endforeach
        @else
        <p> No topics :( </p>
        @endif 
      </tbody>  
    </table> 

 <!-- 
    @foreach ($posts as $post)
    <div class='Message'>
          <p><span class=""> message: {{ $post->message}}</span></p>         

          <div class="userInfo">
            <h6><a href="">name: {{  $post->temp_username  }}</a></h6>
            <ul class="">
              <li>  </li>
            </ul>      
          </div>
          <a class="btn btn-primary" href="{{ action('PostController@create') }}"> comment </a>
      </div>
      @endforeach -->

      @else
      <p> No Posts Found :( </p>
      @endif  
    </div>
  </div>
</div>
@stop

