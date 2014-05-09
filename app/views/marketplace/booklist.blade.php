@extends('layout')

@section('content')

	@foreach($books as $book)
        <tr>
          <td>{{ $book->content }}</td>
          <td><a href="{{ $book->book_title }}">{{ $book->name }}</a></td>
        </tr>
        @endforeach
@stop

