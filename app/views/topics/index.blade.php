@extends('layout')

@section('content')

<div class="page-header">
  <h1>GGC Forum - TopicsINdex</h1>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    
  </div>

</div>

@foreach ($topics as $topic)
    <p>{{ $topic->id }}</p>
@endforeach
</div>

@stop