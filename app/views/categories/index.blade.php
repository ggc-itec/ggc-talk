@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Categories</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
  @if (count($categories) > 0) 
		@foreach ($categories as $category)
     <p>
     	ID:    {{ $category->id }}	
     	<br>
    	Title: {{ $category->title }}	
    	<br>
    	Description: {{ $category->description }}	
	</p> 
	<br>    
@endforeach
@else
 <p> No Categories Found :( </p>
@endif    
  </div>
</div>
</div>
@stop