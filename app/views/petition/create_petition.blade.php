@extends('layout')
@section('content')

<div class="page-header">
	<h1> Create Petition </h1>
</div>
{{ Form::open([ 'class' => 'form-horizontal', 'action' => 'PetitionController@handleCreatePetition', 'files' => true]) }}
	
	<div class="form-group col-md-9" style="margin-right: 5px;">
		{{ Form::label('class_name', 'Class Name', ['class' => 'control-label']) }}
		{{ $errors->first('class_name', '<span class="error">:message</span>') }}
		{{ Form::text('class_name', null, ['class' => 'form-control']) }}
	</div>
	
	<!-- FIX ME better way would be a subjects table in the database -->
	<div class="form-group col-md-3" style="margin-right: 5px;">
		{{ Form::label('subject', 'Subject', ['class' => 'control-label']) }}
		{{ $errors->first('subject', '<span class="error">:message</span>') }}
		{{ Form::select('subject', array(
			'' => '',
			'ACCT' => 'Accounting',
			'ANTH' => 'Anthropology',
			'ARTS' => 'Art',
			'BCHM' => 'Biochemistry',
			'BIOL' => 'Biology',
			'BUSA' => 'Business Administration',
			'CHEM' => 'Chemistry',
			'CHIN' => 'Chinese',
			'COMM' => 'Communications',
			'CJCR' => 'Criminal Justice/Criminology',
			'ECED' => 'Early Childhood Education',
			'ECON' => 'Economics',
			'EDUC' => 'Education',
			'ENGL' => 'English',
			'ELAN' => 'English Literature and Language',
			'EAP' => 'English for Academic Purposes',
			'EXSC' => 'Exercie Science',
			'FILM' => 'Film',
			'FINA' => 'Finance',
			'FREN' => 'French',
			'GEOG' => 'Geography',
			'HIST' => 'History',
			'ITEC' => 'Information Technology',
			'ISCI' => 'Integrated Science',
			'LEAD' => 'Leadership',
			'MGMT' => 'Management',
			'MKTG' => 'Marketing',
			'MATH' => 'Mathematics',
			'MSL' => 'Military Science and Leadership',
			'MUSC' => 'Music',
			'NURS' => 'Nursing',
			'PHIL' => 'Philosophy',
			'PHED' => 'Physical Education',
			'PSCI' => 'Physical Science',
			'POLS' => 'Political Science',
			'PSYC' => 'Psychology',
			'READ' => 'Reading',
			'RELN' => 'Religion',
			'STEC' => 'Science and Technology',
			'SOCI' => 'Sociology',
			'SPAN' => 'Spanish',
			'SPED' => 'Special Education',
			'THEA' => 'Theatre',), '', ['class' => 'form-control', 'style' => 'padding-lefte: 10px;']) }}
		
	</div>
		
	<div class="form-group col-md-9">
		{{ Form::label('class_desc', 'Class Description', ['class' => 'control-label']) }}
		{{ $errors->first('class_desc', '<span class="error">:message</span>') }}
		{{ Form::textarea('class_desc', null, ['size' => '0x10', 'class' => 'form-control']) }}
	</div>
	
	<div class="form-group col-md-12">
		<input type="submit" class="btn btn-primary" value="Post" />
		<a href="{{ URL::to('petitions') }}" class="btn btn-danger">Cancel</a>
	</div>
<!-- </form> -->
{{ Form::close() }}
@stop
