@extends('layout')

@section('content')

<?php
foreach ($books as $book) {
	echo "<table>";
	echo "<td>";
	echo "<tr>";
	echo '<div style="border: 1px solid black;"> Book title : '. $book->book_title .' <br>';
	echo 'Book author :'. $book->book_author .' <br>';
	echo 'Book ISBN10 :'. $book->book_ISBN10 .' <br>';
	echo 'Book ISBB13 :'. $book->book_ISBN13 .' <br>';
	echo 'Book edition :'. $book->book_edition .' <br>';
	echo 'Book condition :'. $book->book_condition.' <br>';
	echo 'Book email :'. $book->book_email .' <br>';
	echo 'Book description :'. $book->book_description .' <div/>';
	echo "</tr>";
	echo "</td>";
	echo "</table>";
}

?>
@stop

