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


<style type="text/css">
  table.topicTable{
    width: 100%;
  }
  .mainPanel{
    background-color: #f6f2f2;
    border: 1px solid #d8d4d4;
    box-shadow: 10px 10px 0 1px #000000;
    -webkit-box-shadow: 10px 10px 0 1px #000000;
    width: 99%;
    margin-bottom: 50px;

  }


  h4.title{
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

  h4.title span{
    float: left;
    font-size: 32px;
    font-weight: normal;
    color: white;
    margin: 7px 0 0 10px;

  }

</style>