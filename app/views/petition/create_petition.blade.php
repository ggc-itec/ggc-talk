@extends('layout')
@section('content')

<div class="page-header">
	<h1> Create Petition </h1>
</div>

<form class="form-horizontal" action="{{ action('PetitionController@handleCreatePetition') }}" method="post" role="form">
	<div class="form-group col-md-9" style="margin-right: 5px;">
		<label class="control-label">Class Name</label>
		<input type="text" class="form-control" name="class_name"/>
	</div>
	
	<div class="form-group col-md-3" style="margin-right: 5px;">
		<label class="control-label">Subject</label>
		<select class="form-control"  style="padding-left: 10px;" name="subject">
			<option value="">Subject</option>
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
			<option VALUE="MKTG">Marketing</option>
			<option VALUE="MATH">Mathematics</option>
			<option VALUE="MSL">Military Science and Leadership</option>
			<option VALUE="MUSC">Music</option>
			<option VALUE="NURS">Nursing</option>
			<option VALUE="PHIL">Philosophy</option>
			<option VALUE="PHED">Physical Education</option>
			<option VALUE="PSCI">Physical Science</option>
			<option VALUE="PHYS">Physics</option>
			<option VALUE="POLS">Political Science</option>
			<option VALUE="PSYC">Psychology</option>
			<option VALUE="READ">Reading</option>
			<option VALUE="RELN">Religion</option>
			<option VALUE="STEC">Science and Technology</option>
			<option VALUE="SOCI">Sociology</option>
			<option VALUE="SPAN">Spanish</option>
			<option VALUE="SPED">Special Education</option>
			<option VALUE="THEA">Theatre</option>
		</select>
	</div>

	<div class="form-group col-md-9">
		<label class="control-label">Class Description</label>
		<textarea class="form-control" rows="10" name="class_desc"></textarea>
	</div>
	
	<div class="form-group col-md-12">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ URL::to('petitions') }}" class="btn btn-danger">Cancel</a>
	</div>
</form>
@stop
