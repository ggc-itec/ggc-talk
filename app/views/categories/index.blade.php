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
          <h2 class=""><span>Title: {{ $category->title }} </span><a class="colspan"></a></h2>
      <p class="count">
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

<style type="text/css">
.CategoryPanel{
  background-color: #f6f2f2;
  border: 1px solid #d8d4d4;
  box-shadow: 10px 10px 0 1px #000000;
  -webkit-box-shadow: 10px 10px 0 1px #000000;
  width: 99%;
  margin-bottom: 50px;

}
.Category{
  float: left;
  border: 1px dotted #d8d4d4;
  background-color: white;
  width: 50%;
  padding: 4px;
  overflow: hidden;  

}

 h2.title{
  height: 58px;
  border-bottom: 1px solid #4b4343;
  box-shadow: 0 1px 0 rgba(0,0,0,.5);
  -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.5);
  background: #594d4d;
  background: -moz-linear-gradient(top, #594d4d 0%, #453c3c 52%, #3e3535 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#594d4d), color-stop(52%,#453c3c), color-stop(100%,#3e3535));
  background: -webkit-linear-gradient(top, #594d4d 0%,#453c3c 52%,#3e3535 100%);
  background: -o-linear-gradient(top, #594d4d 0%,#453c3c 52%,#3e3535 100%);
  background: -ms-linear-gradient(top, #594d4d 0%,#453c3c 52%,#3e3535 100%);
  background: linear-gradient(top bottom, #594d4d 0%,#453c3c 52%,#3e3535 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#594d4d', endColorstr='#3e3535',GradientType=0 );
  margin: 0;
}

h2.title span{
  float: left;
  font-size: 32px;
  font-weight: normal;
  color: white;
  margin: 7px 0 0 10px;

}

</style>