@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - 
    @if (count($category) > 0)  
    {{   $category->title   }}
    @else  
      -
    @endif
  </h1>
</div>
<div class=" mainPanel">
  <div class="panel-body ">
    <table class="topicTable ">
      <thead>
        <th> <h4 class="title"><span>Title </span><a class="colspan"></a></h4> </th>
        <th> <h4 class="title"><span>Description </span><a class="colspan"></a></h4> </th>        
        <th> <h4 class="title"><span>Created </span><a class="colspan"></a></h4> </th>        
      </thead>
      <tbody class="table-striped">
        @if (count($category) > 0)	        
        @foreach ($category->topics(true) as $topic)
        <tr>    
          <td>{{ HTML::linkAction('Posts_TopicController@show', $topic->title, array($topic->id)) }} </td>
          <td> {{ $topic->description }}  </td>
          <td> {{ Dates::showTimeAgo($topic->created_at) }}	</td>
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
