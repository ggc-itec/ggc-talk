@extends('layout')

@section('content')
<div class="page-header">
	<h1> Petition for a Class </h1>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<a href="{{ action('PetitionController@showCreatePetition') }}" class="btn btn-primary">Create Petiton</a>
	</div>
	<div class="panel-body col-md-4" >
		<label class="control-label">Filter By Subject</label>
		<select class="form-control"  style="padding-left: 10px;" name="subject">
			<option value="All">All</option>
			<option VALUE="ACCT">Accounting </option>
			<option VALUE="ANTH">Anthropology</option>
			<option VALUE="ARTS">Art</option>
			<option VALUE="BCHM">Biochemistry</option>
			<option VALUE="BIOL">Biology</option>
			<option VALUE="BUSA">Business Administration</option>
			<option VALUE="CHEM">Chemistry</option>
			<option VALUE="CHIN">Chinese</option>
			<option VALUE="COMM">Communications</option>
			<option VALUE="CJCR">Criminal Justice/Criminology</option>
			<option VALUE="ECED">Early Childhood Education</option>
			<option VALUE="ECON">Economics</option>
			<option VALUE="EDUC">Education</option>
			<option VALUE="ENGL">English</option>
			<option VALUE="ELAN">English Literature and Language</option>
			<option VALUE="EAP">English for Academic Purposes</option>
			<option VALUE="EXSC">Exercise Science</option>
			<option VALUE="FILM">Film</option>
			<option VALUE="FINA">Finance</option>
			<option VALUE="FREN">French</option>
			<option VALUE="GEOG">Geography</option>
			<option VALUE="HIST">History</option>
			<option VALUE="ITEC">Information Technology</option>
			<option VALUE="ISCI">Integrated Science</option>
			<option VALUE="LEAD">Leadership</option>
			<option VALUE="MGMT">Management</option>
			<OPTION VALUE="MKTG">Marketing</option>
			<OPTION VALUE="MATH">Mathematics</option>
			<OPTION VALUE="MSL">Military Science and Leadership</option>
			<OPTION VALUE="MUSC">Music</option>
			<OPTION VALUE="NURS">Nursing</option>
			<OPTION VALUE="PHIL">Philosophy</option>
			<OPTION VALUE="PHED">Physical Education</option>
			<OPTION VALUE="PSCI">Physical Science</option>
			<OPTION VALUE="PHYS">Physics</option>
			<OPTION VALUE="POLS">Political Science</option>
			<OPTION VALUE="PSYC">Psychology</option>
			<OPTION VALUE="READ">Reading</option>
			<OPTION VALUE="RELN">Religion</option>
			<OPTION VALUE="STEC">Science and Technology</option>
			<OPTION VALUE="SOCI">Sociology</option>
			<OPTION VALUE="SPAN">Spanish</option>
			<OPTION VALUE="SPED">Special Education</option>
			<OPTION VALUE="THEA">Theatre</option>
		</select>
	</div>
</div>

@if($petitions->isEmpty())
<p>No Active Petitions</p>
@else
<table class="table table-condensed">
	<thead>
		<tr>
			<th>Class Name</th>
			<th>Subject</th>
		</tr>
	</thead>
	<tbody>
		@foreach($petitions as $petition)
		<tr>
			<td>{{ $petition->class_name }}</td>
			<td>{{ $petition->subject }}</td>
			<td>
				<a href="{{ action('PetitionController@showPetition', $petition->id) }}" 
					class="btn btn-default">View</a>
			@if(Auth::user() -> role == 'Admin')
				<a href="" class="btn btn-danger">Delete</a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif

@stop