@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Topic</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
	@foreach ($Topics as $topic)
     <p>
     	ID:    {{ $topic->id }}	
     	<br>
    	title: {{ $topic->title }}	
    	<br>
    	Category: {{ $topic->category }}	
	</p> 
	<br>    
@endforeach    
  </div>
</div>
</div>
@stop