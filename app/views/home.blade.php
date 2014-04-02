@extends('layout')

@section('content')

   <div class="jumbotron">
      <h2>Quote of the Day</h2> 
      <p>
      <?php 
        $quotes = DB::table('quotes')->get();
        $num = sizeof($quotes); 
        $rand = rand(1,$num-1);
         
        echo $quotes[$rand]->quote . '   </br>-' . $quotes[$rand]->name ;
      ?>
      </p>
    </div>

@stop
