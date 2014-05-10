@extends('layout')

@section('content')

<div class="page-header">
      <h1>Rate My Internship!</h1> 
 </div>
       
  <div class="panel panel-default">
  <div class="panel-body">
  	@if(Auth::check())
    <a href="{{ action('RMIController@upload') }}" class="btn btn-primary">Rate Internship</a>
    @endif
  </div>
</div>


 <div class="panel panel">
  <div class="panel-body">
 @if ($internship->isEmpty())
    <p>There are no internships!</p>
  @else
     <table class="table table-stripped">
      <thead>
        <tr>
          <th>Company Name</th>
          <th>Position</th>
          <th>Started</th>
          <th>Compensation</th>
          <th>Hours Per Week</th>
          <th>Comments</th>
          <th>Challenge</th>
          <th>Networking</th>
          <th>Social</th>
          <th>Importance</th>
          <th>Experience</th>           
        </tr>
      </thead>
      <tbody>
        @foreach($internship as $internship)
        <tr>
          <td>{{ $internship->companyName }}</td>
          <td>{{ $internship->position }}</td>
          <td>{{ $internship->started }}</td>
          <td>{{ $internship->compensation }}</td>
          <td>{{ $internship->hrPerWeek }}</td>
          <td>{{ $internship->comments }}</td>
          
          
          <td>{{ $internship->challenge }}</td>
          <td>{{ $internship->networking }}</td>
          <td>{{ $internship->social }}</td>
          <td>{{ $internship->importance }}</td>
          <td>{{ $internship->experience }}</td>
          <td>
          	
          	@if(Auth::check() && Auth::user() -> role == 'Admin')
          	<a href="{{ action('RMIController@deleteInternship', $internship->id) }}" class="btn btn-danger">Delete</a>
          	<a href="{{ action('RMIController@editInternship', $internship->id) }}" class="btn btn-primary">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
          	@elseif(Auth::check() && Auth::user()->id == $internship->creatorID)
          	<a href="{{ action('RMIController@deleteInternship', $internship->id) }}" class="btn btn-danger">Delete</a>
          	<a href="{{ action('RMIController@editInternship', $internship->id) }}" class="btn btn-primary">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
          	@else
          	@endif
          </td>
          <td>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif



@stop
 </div>
