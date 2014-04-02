@extends('layout')

@section('content')
  <div class="page-header">
      <h1> All locations </h1>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('LocationController@create') }}" class="btn btn-primary">Create Location</a>
    </div>
  </div>
  
  @if ($locations->isEmpty())
    <p>There are no locations!</p>
  @else
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Longitude</th>
          <th>Latitude</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        @foreach($locations as $location)
        <tr>
          <td>{{ $location->name }}</td>
          <td>{{ $location->longitude }}</td>
          <td>{{ $location->latitude }}</td>
          <td>{{ $location->description }}</td>
          <td>
            
            <a href="{{ action('LocationController@showMap', $location->id) }}"
              class="btn btn-default">Show</a>
            <a href="{{ action('LocationController@edit', $location->id) }}"
              class="btn btn-default">Edit</a>
            <a href="{{ action('LocationController@delete', $location->id) }}"
              class="btn btn-danger">Delete</a>  
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
  
@stop
