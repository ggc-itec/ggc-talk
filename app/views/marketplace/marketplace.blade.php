@extends('layout')

@section('content')
          
<?php

$i = 0;

for ($i = 0; $i < 100; $i++)
{
	echo "Hello World!";
}
?>

<div style="text-align: center">
<form action="{{ action('MarketPlaceController@handle_add') }}" method="post" role="form">
            
            Book Title: <input type="input" name="name" value="" /><br />
            Book Author: <input type="input" name="author" value="" /><br />
            Book ISBN-10: <input type="input" name="isbn10" value="" /><br />
            Book ISBN-13: <input type="input" name="isbn13" value="" /><br />
            Book Edition: <input type="input" name="edition" value="" /><br />
            Book Condition: <input type="input" name="condition" value="" /><br />
            <input type="submit" class="btn btn-danger" value="Add" />
          </form>
</div>
