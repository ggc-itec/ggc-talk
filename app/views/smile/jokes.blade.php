@extends('layout')

@section('content')

   <div class="jumbotron">
      <h2>Joke of the Day</h2> 
      <p>
      <?php 
        $jokes = DB::table('jokes')->get();
        $num = sizeof($jokes); 
        $rand = rand(1,$num-1);
         
        echo $jokes[$rand]->joke;
      ?>
      </p>
    </div>

@stop
