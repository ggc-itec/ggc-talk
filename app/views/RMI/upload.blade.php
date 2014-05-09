@extends('layout')

@section('content')

<div class="page-header">
      <h1>Rate My Internship!</h1>  
</div>
       
       @if(Auth::check())
<!-- form -->
 <form action="{{ action('RMIController@handleCreate') }}" method="post" role="form">
   

    <div class="form-group">
        <label for="description">Company Name:</label>
        <input type="text" class="form-control" name="companyName" />
    </div>

    <div class="form-group">
        <label for="description">Position:</label>
        <input type="text" class="form-control" name="position" />
    </div>
    
    <div class="form-group">
        <label for="description">Time Started:</label>
        <input type="text" class="form-control" name="started" />
    </div>

    <div class="form-group">
        <label for="description">Compensation:</label>
        <input type="text" class="form-control" name="compensation" />
    </div>
    
    <div class="form-group">
        <label for="description">Hours Per Week</label>
        <input type="text" class="form-control" name="hrPerWeek" />
    </div>

    <div class="form-group">
        <label for="description">Comments:</label>
        <input type="text" class="form-control" name="comments" />
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
  <input type="hidden" name="creatorID" value="{{ Auth::user()->id }}" />
 <input type="submit" value="Post" class="btn btn-primary" />
</form>
	@else
	You must be logged in to rate!
	@endif
@stop