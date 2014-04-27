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
			<OPTION VALUE="ACCT">Accounting </option>
			<OPTION VALUE="ANTH">Anthropology</option>
			<OPTION VALUE="ARTS">Art</option>
			<OPTION VALUE="BCHM">Biochemistry</option>
			<OPTION VALUE="BIOL">Biology</option>
			<OPTION VALUE="BUSA">Business Administration</option>
			<OPTION VALUE="CHEM">Chemistry</option>
			<OPTION VALUE="CHIN">Chinese</option>
			<OPTION VALUE="COMM">Communications</option>
			<OPTION VALUE="CJCR">Criminal Justice/Criminology</option>
			<OPTION VALUE="ECED">Early Childhood Education</option>
			<OPTION VALUE="ECON">Economics</option>
			<OPTION VALUE="EDUC">Education</option>
			<OPTION VALUE="ENGL">English</option>
			<OPTION VALUE="ELAN">English Literature and Language</option>
			<OPTION VALUE="EAP">English for Academic Purposes</option>
			<OPTION VALUE="EXSC">Exercise Science</option>
			<OPTION VALUE="FILM">Film</option>
			<OPTION VALUE="FINA">Finance</option>
			<OPTION VALUE="FREN">French</option>
			<OPTION VALUE="GEOG">Geography</option>
			<OPTION VALUE="HIST">History</option>
			<OPTION VALUE="ITEC">Information Technology</option>
			<OPTION VALUE="ISCI">Integrated Science</option>
			<OPTION VALUE="LEAD">Leadership</option>
			<OPTION VALUE="MGMT">Management</option>
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
