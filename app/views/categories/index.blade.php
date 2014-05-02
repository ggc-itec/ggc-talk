@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - Categories</h1>
  <a class="btn btn-primary" href="{{ action('Posts_CategoryController@create') }}"> add Category </a>
</div>
<div class="panel panel-default">
  <div class="panel-body CategoryPanel">
    <h2 class="title"><span>Categories </span><a class="colspan"></a></h2>
    @if (count($categories) > 0) 
    @foreach ($categories as $category)         
    <div class="Category">     
      <h2 class=""><span>{{ HTML::linkAction('Posts_CategoryController@show', $category->title, array($category->id)) }} </span><a class="colspan"></a></h2>
      <p class="">
        {{ Form::hidden('categoryID',  $category->id) }}
        Description: {{ $category->description }} 
        <br><span>Topics</span>  
        <br><span>Posts</span> 
      </p>
    </div>
    @endforeach
    @else
    <p> No Categories Found :( </p>
    @endif    
  </div>
</div>
@stop
