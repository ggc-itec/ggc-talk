@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - 
   
   {{ $posts[0]->topic->title}}
 
  </h1>
</div>






   <!-- <table>
        
      <table class="topicTable ">
        <thead>
          <th> <h4 class="title"><span> </span><a class="colspan"></a></h4> </th>
          <th> <h4 class="title"><span> </span><a class="colspan"></a></h4> </th>

        </thead>
        <tbody class="table-striped">-->

        <div class="container boxShadowPanel">
       <div class="row topicHeader">
             <div class="userInfo col-sm-4">
             User
            </div>
          
           <div class="userInfo col-sm-8">
            Message
          </div>
        </div>
        
@if (count($posts) > 0)  
@foreach ($posts as $post)
          <!--<tr>    

            <td>   -->


         <div class="row messageInstance">
              <div class="userInfo col-sm-4">
              {{ $post->temp_username}}  <br>
              posted {{ Dates::showTimeAgo($post->created_at) }}    
            </div>
          
           <div class="userInfo col-sm-8">
            {{ $post->message }}  
          </div>
         </div> 
         
       <!-- </td>
      </tr>
-->
@endforeach
@else
      <p> No topics :( </p>
@endif 
   </div>


  <div class="page-header">
    <h5>Create Post <small>say something</small></h5>
  </div>  
  <form action="{{ action('PostController@store') }}" method="POST" role="form">
    <div class="form-group">
      <label for="title">title</label>
      
    </div>    
       <input type="hidden" name="topic_id" value="{{ $posts[0]->topic->id}}" />
     <div class="form-group">
      <label for="message">Temp Name</label>
      <input type="text" class="form-control" name="temp_username" />
    </div>  
    <div class="form-group">
      <label for="message">message</label>
      <input type="text" class="form-control" name="message" />
    </div>    
    <input type="submit" value="Create" class="btn btn-primary" />
    <a href="" class="btn btn-link">Clear</a>
  </form>

@stop

