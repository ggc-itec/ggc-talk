@extends('layout')

@section('content')

<h1>Post Successfull!</h1>
<a class="btn btn-success" href="{{ action('HousingController@showListings') }}">OK</a>

@stop
