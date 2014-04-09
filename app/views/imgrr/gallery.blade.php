@extends('layout')

@section('content')
  
<div class="page-header">
  <h1>Gallery</h1>
</div>
      
<div class="panel panel-default">
  <div class="panel-body">
    <a href="{{ action('ImgrrController@upload') }}" class="btn btn-primary">Upload Image</a>
  </div>
</div>

@if($pics->isEmpty())
  <p>There are no pics!</p>
@else
  <table class="table table-stripped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pics as $pic)
      <tr>
        <td>
          {{ $pic->title }}
        </td>
        <td>
          <a href="{{ action('ImgrrController@displayComments',$pic->id); }}">
            <img src="{{ URL::asset( 'images/' . $pic->filename ); }}" width="300px" />
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif     

@stop