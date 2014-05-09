@extends('layout')

@section('content')

<div style="width: 60%; margin: 0px auto;">

<div class="jumbotron" align="center">
  <div class="col-lg-12" style="padding-left: 5; padding-right: 5px;">
    {{ Form::open(array('action' => 'MarketPlaceController@handle_add', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
    <fieldset>
      <legend>
        <h2><center>Search or add Asses(asses)?!</center></h2>
      </legend>
                      <a class="btn btn-primary" href="{{ URL::to('/go_to_search') }}">Search</a>
                      <a class="btn btn-primary" href="{{ URL::to('/go_to_add') }}">Add</a>
  </div>
</div>
</div>

@stop