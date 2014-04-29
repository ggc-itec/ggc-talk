@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Topic</h1>
</div>
<div class=" mainPanel">
  <div class="panel-body ">
  <a class="btn btn-primary" href="{{ action('Posts_TopicController@create') }}"> add Topic </a>
    <table class="topicTable ">
      <thead>
        <th> <h4 class="title"><span> </span><a class="colspan"></a></h4> </th>
        <th> <h4 class="title"><span> </span><a class="colspan"></a></h4> </th>
        
      </thead>
      <tbody class="table-striped">
        @if (count($topics) > 0)	
        @foreach ($topics as $topic)
        <tr>    
        
          <td> {{ $topic->category->title }}	</td>
          <td>{{Dates::showTimeAgo($topic->created_at)}}</td>
        </tr>

        @endforeach
        @else
        <p> No topics :( </p>
        @endif 
      </tbody>  
    </table> 
  </div>
</div>

@stop
