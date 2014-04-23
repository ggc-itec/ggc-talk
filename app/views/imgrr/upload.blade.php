@extends('layout')

@section('content')

<div class="page-header">
  <h1>Upload Image</h1>
</div>
       
       
{{ Form::open(array(
    'action' => 'ImgrrController@handleUpload',
    'files' => true
   )) }}

  {{ Form::label('instruction_title', 'Title of Image') }}
  {{ Form::text('title') }}
  
  {{ Form::label('instruction_filename', 'Pick file to upload') }}
  {{ Form::file('image') }}
  
  {{ Form::submit('Upload') }}

{{ Form::close() }}

@stop