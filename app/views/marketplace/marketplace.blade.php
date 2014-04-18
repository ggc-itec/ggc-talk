@extends('layout')

@section('content')

<?php

$i = 0;

for ($i = 0; $i < 100; $i++)
{
	echo "Hello World!";
}
?>

	<form method="POST" action="/marcus">
		<p>
			<label for="User">Username</label></br />
		</p>
	</form>

