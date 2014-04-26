@extends('layout')

@section('content')

<div class="jumbotron">
  <h1>User Administration</h1>
  <table class="table">
    <tr>
      <th> ID </th>
      <th> First Name </th>
      <th> Last Name </th>
      <th> Role </th>
      <th> Actions </th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td> {{ $user -> id }} </td>
      <td> {{ $user -> first_name }} </td>
      <td> {{ $user -> last_name }} </td>
      <td> {{ $user -> role }} </td>
      <td><a href="{{ route('editUser', array($user -> id)) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a href="{{ route('deleteUser', array($user -> id)) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    @endforeach
  </table>
</div>

@stop

