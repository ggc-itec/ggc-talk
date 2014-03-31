@extends('layout')

@section('content')

<img class="img-rounded" src="http://maps.googleapis.com/maps/api/staticmap?&size=512x512&scale=2&maptype=satellite&markers=size:mid%7Ccolor:red%7C{{$location->longitude}},{{$location->latitude}}&sensor=false"
@stop
