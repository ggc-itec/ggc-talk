@extends('layout')

@section('content')

<div class="page-header">
      <h1>Edit Internship.</h1>  
</div>
       
       
<!-- form -->
 <form action="{{ action('RMIController@handleEdit') }}" method="post" role="form">
   

    <div class="form-group">
        <label for="description">Company Name:</label>
        <input type="text" class="form-control" name="companyName" value="{{ $internship->companyName }}"/>
    </div>

    <div class="form-group">
        <label for="description">Position:</label>
        <input type="text" class="form-control" name="position" value="{{ $internship->position }}"/>
    </div>
    
    <div class="form-group">
        <label for="description">Time Started:</label>
        <input type="text" class="form-control" name="started" value="{{ $internship->started }}"/>
    </div>

    <div class="form-group">
        <label for="description">Compensation:</label>
        <input type="text" class="form-control" name="compensation" value="{{ $internship->compensation }}"/>
    </div>
    
    <div class="form-group">
        <label for="description">Hours Per Week</label>
        <input type="text" class="form-control" name="hrPerWeek" value="{{ $internship->hrPerWeek }}"/>
    </div>

    <div class="form-group">
        <label for="description">Comments:</label>
        <input type="text" class="form-control" name="comments" value="{{ $internship->comments }}"/>
    </div>
  
    <div class="form-group">
        <label for="description">Challenge:</label>
        <select name="challenge" >
        <option value=0>Rate</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Networking:</label>
        <select name="networking" >
        <option value=0>Rate</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Social Environment:</label>
        <select name="social" >
        <option value=0>Rate</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Importance of Work:</label>
        <select name="importance" >
        <option value=0>Rate</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Real World Experience:</label>
        <select name="experience" >
        <option value=0>Rate</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        </select>
    </div>
  <input type="hidden" name="internship" value="{{ $internship->id }}" />
  <input type="hidden" name="creatorID" value="{{ $internship->creatorID }}" />
 <input type="submit" value="Done Editing" class="btn btn-primary" />  
</form>
@stop