@extends('layout')

@section('content')

<div style="width: 60%; margin: 0px auto;">

<div class="jumbotron" align="center">
  <div class="col-lg-12" style="padding-left: 5; padding-right: 5px;">
    {{ Form::open(array('action' => 'MarketPlaceController@handle_add', 'id' => 'registerForm', 'class' => 'form-horizontal')) }}
    <fieldset>
      <legend>
        <h2><center>Add Book</center></h2>
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
          {{ Form::text('email', '', array('class' => 'form-control input-lg', 'placeholder' => 'Your E-mail Address')) }}
      </div>
       <div class="form-group">
          {{ Form::text('book_description', '', array('class' => 'form-control input-lg', 'placeholder' => 'Description/Cost')) }}
      </div>
      <div class="form-group">
        <div class="pull-center">
          <!-- <button type="submit" class="btn btn-success" value = "Post"> -->
          <button href="{{ action('MarketPlaceController@handle_add') }}" value = "Post" type="submit" class="btn btn-primary">Add New Book</button>
          <!-- </button> -->
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