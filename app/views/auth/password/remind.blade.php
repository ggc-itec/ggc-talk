@extends('layout')

@section('content')

<div class="well">
  {{ Form::open(array('action' => 'RemindersController@postRemind', 'id' => 'reminderForm', 'class' => 'form-horizontal')) }}
  <fieldset>
    <legend>
      <h2>Password Reminder</h2>
    </legend>
    <div class="form-group">
      <div class="col-lg-12">
        {{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Email', 'required' => '')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-lg">
          Send Reminder
        </button>
      </div>
    </div>
  </fieldset>
  {{ Form::close() }}
</div>

@stop