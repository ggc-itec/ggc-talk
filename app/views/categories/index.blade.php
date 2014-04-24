@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Categories</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
		@foreach ($categories as $category)
     <p>
     	ID:    {{ $category->id }}	
     	<br>
    	Title: {{ $category->title }}	
	</p> 
	<br>    
@endforeach    
  </div>
</div>
</div>
@stop