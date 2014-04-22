@extends('layout')

@section('content')

<div class="well">
  {{ Form::open( array('route' => 'account', 'class' => 'form-horizontal')) }}
  <fieldset>
    <legend>
      <h2>Update Account Information</h2>
    </legend>
    <div class="form-group">
      <div class="col-lg-6">
        {{ Form::text('first_name', $user -> first_name, array('class' => 'form-control input-lg', 'placeholder' => 'First Name', 'required' => '')) }}
      </div>
      <div class="col-lg-6">
        {{ Form::text('last_name', $user -> last_name, array('class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'required' => '')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'New Password')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::password('confirm_password', array('class' => 'form-control input-lg', 'placeholder' => 'Confirm New Password')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </div>
    </div>
  </fieldset>
  {{ Form::close() }}
</div>

@stop