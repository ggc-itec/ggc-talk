@extends('layout')

@section('content')
<div class="page-header">
    <h1>Add Techtalk</small></h1>
</div>

<form action="{{ action('TechTalkController@handleAdd') }}" method="post" role="form">
    <div class="form-group">
        <label for="longitude">Speaker</label>
        <input type="text" class="form-control" name="speaker" />
    </div>

    <div class="form-group">
        <label for="latitude">Title</label>
        <input type="text" class="form-control" name="title" />
    </div>

    <input type="submit" value="Create" class="btn btn-primary" />
    <a href="{{ action('TechTalkController@index') }}" class="btn btn-link">Cancel</a>
</form>
@stop