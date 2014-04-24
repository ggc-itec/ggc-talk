@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    
  </div>

</div>

@foreach ($categories as $category)
    <p>{{ $category->id }}</p>
@endforeach
</div>

@stop