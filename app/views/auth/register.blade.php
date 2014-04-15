@extends('layout')

@section('content')

<div class="jumbotron">
  <div class="col-lg-6">
    {{ Form::open(array('action' => 'UserController@register', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
    <fieldset>
      <legend>
        <h2>Sign up!</h2>
      </legend>
      <div class="form-group">
        <div class="col-lg-6" style="padding-left: 0; padding-right: 7px;">
          {{ Form::text('first_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'First Name')) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0; padding-left: 8px;">
          {{ Form::text('last_name', '', array('class' => 'form-control input-lg', 'placeholder' => 'Last Name')) }}
        </div>
      </div>
      <div class="form-group">
          {{ Form::email('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email')) }}
      </div>
      <div class="form-group">
          {{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Password')) }}
      </div>
      <div class="form-group">
          {{ Form::password('confirm_password', array('class' => 'form-control input-lg', 'placeholder' => 'Confirm Password')) }}
      </div>
      <div class="form-group">
        <div class="pull-right">
          <button class="btn btn-default">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Sign up
          </button>
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
  </div>
</div>

@stop