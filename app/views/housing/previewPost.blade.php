@extends('layout')

@section('content')

<div class="page-header">
	<h3>Eventually, your listing preview will appear on this page.</h3>
</div>

<a class="btn btn-success" href="{{ action('HousingController@showListings') }}">OK</a>

@stop
