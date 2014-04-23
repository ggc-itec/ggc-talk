@extends('layout')

@section('content')
<div class="page-header">
      <h1> Latest from Flickr </h1>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('FlickrPicController@index') }}" class="btn btn-primary">Refresh</a>
      <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-primary">Favorites</a>
    </div>
  </div>
  

<div style="text-align: center">
<form action="{{ action('MarketPlaceController@handle_add') }}" method="post" role="form">
            
            Book Title: <input type="input" name="name" value="" /><br />
            Book Author: <input type="input" name="author" value="" /><br />
            Book ISBN-10: <input type="input" name="isbn10" value="" /><br />
            Book ISBN-13: <input type="input" name="isbn13" value="" /><br />
            Book Edition: <input type="input" name="edition" value="" /><br />
            Book Condition: <input type="input" name="condition" value="" /><br />
            <input type="submit" class="btn btn-success" value="Add" />
          </form>
</div>

<table class="container">
		straight HTML 
  </table>
 </class>
