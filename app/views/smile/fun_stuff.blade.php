@extends('layout')

@section('content')

   <div class="jumbotron">
       <row>
         <h2>Joke of the Day</h2> 
           <p>
             <?php 
              $jokes = DB::table('jokes')->get();
              $num = sizeof($jokes); 
              $rand = rand(1,$num-1);
              
              echo $jokes[$rand]->joke;
             ?>
           </p>
       </row>

<div class="row">
    <h2> Have a Picture of an Adorable Cat! </h2>
</div>

<div class="panel panel-default">
    <div class="row">
        <h4><img src="{{ asset('img/adorable-kitty.PNG'); }}" style="height: 600px; width: 450px;"/><label style="color: green;">Kitty!</label></h4>
    </div>
</div>

<div class="row">
     <a href="{{ action('SmileController@showHappyVideo') }}" class="btn btn-primary">Press this button for a funny video!</a>
</div>

</div>
@stop