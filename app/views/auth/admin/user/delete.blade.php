@extends('layout')@section('content')
{{ Form::open( array('url' => route('deleteUser', array('id' => $user -> id)))) }}<legend>  Are you sure you want to delete user {{ $user -> id }}? This process is irreversible.</legend><div class="form-group">  <a class="btn btn-default" href="{{ route('modUsers') }}"> Cancel </a>  <button type="submit" class="btn btn-danger">    Delete  </button></div>{{ Form::close() }}
@stop
