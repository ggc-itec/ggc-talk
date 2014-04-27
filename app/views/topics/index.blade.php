@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Topic</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
@if (count($topics) > 0)	
	@foreach ($topics as $topic)
     <p>
     	ID:    {{ $topic->id }}	
     	<br>
      title: {{ $topic->title }}	
    	<br>
      Description: {{ $topic->description }}  
      <br>
    	Category: {{ $topic->category->title }}	11
	</p> 
	<br>    
@endforeach
@else
 <p> No topics :( </p>
@endif    
  </div>
</div>
</div>
@stop