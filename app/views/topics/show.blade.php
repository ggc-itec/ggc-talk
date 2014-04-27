@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Topic</h1>
</div>
<div class=" mainPanel">
  <div class="panel-body ">
    <table class="topicTable ">
      <thead>
        <th> <h4 class="title"><span>Title </span><a class="colspan"></a></h4> </th>
        <th> <h4 class="title"><span>Description </span><a class="colspan"></a></h4> </th>
        <th> <h4 class="title"><span>Category </span><a class="colspan"></a></h4> </th>
      </thead>
      <tbody class="table-striped">
        @if (count($topics) > 0)	
        @foreach ($topics as $topic)
        <tr>    
          <td>{{ HTML::linkAction('PostController@show', $topic->title, array($topic->id)) }} </td>
          <td> {{ $topic->description }}  </td>
          <td> {{ $topic->category->title }}	</td>
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
