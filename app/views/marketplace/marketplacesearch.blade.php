@extends('layout')

@section('content')

<div style="width: 60%; margin: 0px auto;">

<div class="jumbotron" align="center">
  <div class="col-lg-12" style="padding-left: 5; padding-right: 5px;">
    {{ Form::open(array('action' => 'MarketPlaceController@handle_search', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
    <fieldset>
      <legend>
        <h2><center>Add or Search For Asses</center></h2>
      </legend>
      <div class="form-group">
          {{ Form::text('name', '', array('class' => 'form-control input-lg', 'placeholder' => 'Enter Book Title')) }}
        </div>
        <div class="form-group">
          {{ Form::text('author', '', array('class' => 'form-control input-lg', 'placeholder' => 'Enter Book Author')) }}
        </div>
      <div class="form-group">
          {{ Form::text('isbn10', '', array('class' => 'form-control input-lg', 'placeholder' => 'Enter ISBN-10')) }}
      </div>
      <div class="form-group">
          {{ Form::text('isbn13', '', array('class' => 'form-control input-lg', 'placeholder' => 'Enter ISBN-13')) }}
      </div>
       <div class="form-group">
          {{ Form::text('edition', '', array('class' => 'form-control input-lg', 'placeholder' => 'Book Edition')) }}
      </div>
       <div class="form-group">
          {{ Form::text('condition', '', array('class' => 'form-control input-lg', 'placeholder' => 'Book Condition')) }}
      </div>
      <div class="form-group">
        <div class="pull-center">
         <button type="submit" class="btn btn-primary">
            Search
          </button>
          <button type="submit" class="btn btn-success">
          	Add New Book
          </button>
          <button class="btn btn-danger">
            Clear Form
          </button>
        </div>
      </div>
    </fieldset>
    {{ Form::close() }}
  </div>
</div>
</div>

@stop