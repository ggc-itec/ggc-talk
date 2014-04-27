@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Categories</h1>
</div>

  
  @if (count($categories) > 0) 
		@foreach ($categories as $category)
<div class="panel panel-default col-md-3">
  <div class="panel-body">
     <p>
       	ID:    {{ $category->id }}	
       	<br>
      	Title: {{ $category->title }}	
      	<br>
      	Description: {{ $category->description }}	
	   </p> 
	   <br>    
  </div>
</div>
@endforeach
@else
 <p> No Categories Found :( </p>
@endif    



@stop