@extends('layout')

@section('content')

<div class="well">
  {{ Form::open(array('action' => 'RemindersController@postReset', 'id' => 'resetForm', 'class' => 'form-horizontal')) }}
  <input type="hidden" name="token" value="{{ $token }}">
  <fieldset>
    <legend>
      <h2>Password Reset</h2>
    </legend>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Password', 'required' => '')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::password('password_confirmation', array('class' => 'form-control input-lg', 'placeholder' => 'Confirm Password', 'required' => '')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-lg">
          Reset Password
        </button>
      </div>
    </div>
  </fieldset>
  {{ Form::close() }}
</div>

@stop