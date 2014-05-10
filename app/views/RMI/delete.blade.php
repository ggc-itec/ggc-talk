@extends('layout')

@section('content')
<div class="page-header">
	<h1>Delete Internship: {{ $internship->companyName }}</h1>
	<h2>Are you sure?</h2>
</div>

 <div class="panel panel">
  <div class="panel-body">
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
          </td>
          <td>    
          </td>
        </tr>
      </tbody>
    </table>
 </div>
</div>
<table>
	<tr>
		<td></td>
		<td>
			<form action="{{ action('RMIController@handleDelete') }}" method="post" role="form">
    			<input type="hidden" name="internship" value="{{ $internship->id }}" />
    			<input type="submit" class="btn btn-danger" value="Yes" />
    			<a href="{{ action('RMIController@showList') }}" class="btn btn-default">NU!</a>
			</form>
		</td>
	</tr>
</table>

@stop