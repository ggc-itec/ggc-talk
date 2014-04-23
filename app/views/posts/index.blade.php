@extends('layout')

@section('content')
   <div class="jumbotron">
      <h2>Quote of the Day</h2> 
      <p>
		This is the index.blade for the PostController
      </p>
    </div>




@if (count($posts) > 0)    
	@foreach ($posts as $p)
	    <p>Title: {{ $p->title }}</p>
	    <p>Message:  {{ $p->message }}</p>
	@endforeach
@else
    I don't have any records!
@endif


@stop


